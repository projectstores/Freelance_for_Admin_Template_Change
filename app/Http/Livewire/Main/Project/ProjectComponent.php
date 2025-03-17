<?php

namespace App\Http\Livewire\Main\Project;

use App\Models\Admin;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectBid;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ReportedProject;
use App\Models\ProjectBidUpgrade;
use App\Models\ProjectBiddingPlan;
use App\Notifications\Admin\ProjectReported;
use App\Notifications\Admin\BidPendingApproval;
use App\Http\Validators\Main\Project\BidValidator;
use App\Notifications\User\Everyone\NewBidReceived;
use App\Http\Validators\Main\Project\ReportValidator;
use App\Jobs\Main\Project\Track;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProjectComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $project;
    public $avg_bid;
    public $sort_bids_by;
    public $already_submitted_proposal;
    
    // Bid form
    public $bid_amount;
    public $bid_amount_paid;
    public $bid_days;
    public $bid_description;
    public $bid_sponsored;
    public $bid_sealed;
    public $bid_highlight;
    public $bid_current_step = 1;

    // Report form
    public $report_reason;
    public $report_description;


    /**
     * Init component
     *
     * @return void
     */
    public function mount($pid, $slug)
    {
        // Get projects settings
        $settings = settings('projects');

        // Check if this section enabled
        if (!$settings->is_enabled) {
            return redirect('/');
        }

        // Get project
        $project = Project::where('pid', $pid)
                            ->where('slug', $slug)
                            ->withCount(['bids' => function($query) {
                                return $query->where('status', 'active');
                            }])
                            ->firstOrFail();

        // Check if admin authenticated
        if (auth('admin')->check()) {
            
            // Set project
            $this->project = $project;

        } else if (auth()->check() && $project->user_id === auth()->id()) {
            
            // Set project
            $this->project = $project;

        } else {

            // So, no one authenticated (admin or user)
            // We have to check the status of this project first
            if (in_array($project->status, ['pending_approval', 'pending_payment', 'hidden', 'rejected'])) {
                
                // Not found
                return abort(404);

            }

            // Set the project
            $this->project = $project;

        }

        // Track this visit
        Track::dispatch([
            'project_id' => $project->id,
            'ip'         => request()->ip(),
            'ua'         => request()->server('HTTP_USER_AGENT')
        ]);

        // Calculate avg bid
        $this->avg_bid();

        // Check if user already submitted a proposal for this project
        $this->checkIfAlreadySubmittedBid();
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = $this->project->title . " $separator " . settings('general')->title;
        $description = $this->project->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.project.project', [
            'plans' => $this->plans,
            'bids'  => $this->bids
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get bidding plans
     *
     * @return mixed
     */
    public function getPlansProperty()
    {
        // Check if promoting bids allowed
        if (settings('projects')->is_premium_bidding) {

            // Don't get sponsored plan, if already has a sponsored bid
            // Because only one sponsored bid is allowed
            if ($this->hasSponsoredBid()) {
                
                // Get plans without sponsored
                return ProjectBiddingPlan::whereIsActive(true)->where('plan_type', '!=', 'sponsored')->get();

            }

            // Return all plans, no sponsored bid yet
            return ProjectBiddingPlan::whereIsActive(true)->get();

        } else {
            return null;
        }
    }


    /**
     * Get bids on this project
     *
     * @return object
     */
    public function getBidsProperty()
    {
        // Check if has a sort by
        if (in_array($this->sort_bids_by, ['newest', 'oldest', 'fastest', 'cheapest'])) {

            // Check sort by
            switch ($this->sort_bids_by) {

                // Newest
                case 'newest':
                    return ProjectBid::whereProjectId($this->project->id)
                                    ->whereIsSponsored(false)
                                    ->whereStatus('active')
                                    ->latest()
                                    ->get();
                    break;

                // Oldest
                case 'oldest':
                    return ProjectBid::whereProjectId($this->project->id)
                                    ->whereIsSponsored(false)
                                    ->whereStatus('active')
                                    ->oldest()
                                    ->get();
                    break;

                // Fastest
                case 'fastest':
                    return ProjectBid::whereProjectId($this->project->id)
                                    ->whereIsSponsored(false)
                                    ->whereStatus('active')
                                    ->orderBy('days', 'asc')
                                    ->get();
                    break;

                // Cheapest
                case 'cheapest':
                    return ProjectBid::whereProjectId($this->project->id)
                                    ->whereIsSponsored(false)
                                    ->whereStatus('active')
                                    ->orderBy('amount', 'asc')
                                    ->get();
                    break;
            }
        }

        // No sort by
        return ProjectBid::whereProjectId($this->project->id)->whereIsSponsored(false)->whereStatus('active')->get();
    }


    /**
     * Filter bids
     *
     * @param string $by
     * @return void
     */
    public function filter($by)
    {
        // Check sort by
        if (in_array($by, ['newest', 'oldest', 'fastest', 'cheapest'])) {
            
            // Set sort by
            $this->sort_bids_by = $by;

        }
    }


    /**
     * Calculate avg bid
     *
     * @return void
     */
    private function avg_bid()
    {
        // Get tota bids
        $bids_counter = $this->project->bids()->count();

        // Get total amount of bids
        $bids_amount  = $this->project->bids->sum('amount');

        // Check if it has any bids
        if ($bids_counter !== 0) {
            
            // Set avg bid
            $this->avg_bid = number_format((float)($bids_amount / $bids_counter), 2, '.', '');

        } else {

            // No bids yet
            $this->avg_bid = 0;

        }
    }


    /**
     * Get client hidden username
     *
     * @return string
     */
    public function clientUsername()
    {
        // Get client username
        $username = $this->project->client->username;

        // Get username lenght
        $length   = strlen($username);

        // Set visible characters
        $visible  = (int) round($length / 4);

        // Count hidden characters
        $hidden   = $length - ($visible * 2);

        // Return hidden username
        return substr($username, 0, $visible) . str_repeat('*', $hidden) . substr($username, ($visible * -1), $visible);
    }


    /**
     * Go back to previous step in bid form
     *
     * @return void
     */
    public function back()
    {
        // Check if on second step
        if ($this->bid_current_step === 2) {
            $this->bid_current_step = 1;
        }
    }


    /**
     * Go to next step to bid
     *
     * @return mixed
     */
    public function next()
    {
        try {

            // We have to check if user authenticated
            if (!auth()->check()) {
                
                // Go to login
                return redirect('auth/login');

            }

            // Only freelancers can send bids
            if (auth()->user()->account_type !== 'seller') {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_toast_something_went_wrong'),
                    'icon'        => 'error'
                ]);

                return;

            }
            
            // Now, this project must be active to send bids
            if ($this->project->status !== 'active') {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_project_not_active_to_send_proposals'),
                    'icon'        => 'error'
                ]);

                return;
            }

            // So project is active, but employer not allow to send bids to himself
            if (auth()->id() == $this->project->user_id) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cant_submit_bids_to_urself'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // After that we have to check if this user already submitted a bid to this project
            if (ProjectBid::whereProjectId($this->project->id)->whereUserId(auth()->id())->first()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_already_submitted_a_bid_to_this_project'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Check if first step
            if ($this->bid_current_step === 1) {
                
                // Validate form
                BidValidator::validate($this);

                // Bid amount must be between project's budget
                if (convertToNumber($this->bid_amount) < convertToNumber($this->project->budget_min) || convertToNumber($this->bid_amount) > convertToNumber($this->project->budget_max) ) {
						
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_pls_insert_bid_value_between_budget'),
                        'icon'        => 'error'
                    ]);
                    
                    return;

                }

                // Form is valid, we have to check if promoting bids allowed
                if (settings('projects')->is_premium_bidding) {
                    
                    // Go to next setp
                    $this->bid_current_step = 2;
                    
                    return;

                } else {

                    // Create new bid
                    $response = $this->bid();

                    // Reset bidding form
                    $this->reset([
                        'bid_amount',
                        'bid_amount_paid',
                        'bid_days',
                        'bid_description',
                        'bid_sponsored',
                        'bid_sealed',
                        'bid_highlight',
                        'bid_current_step'
                    ]);

                    // Close modal
                    $this->dispatchBrowserEvent('close-modal', 'modal-bid-container');

                    // Return response depends on bid's status
                    if (isset($response['status'])) {
                        
                        // Check status
                        switch ($response['status']) {

                            // Active
                            case 'active':
                                
                                $this->notification([
                                    'title'       => __('messages.t_success'),
                                    'description' => __('messages.t_ur_bid_has_been_posted'),
                                    'icon'        => 'success'
                                ]);

                                break;

                            // Pending approval
                            case 'pending_approval':
                                
                                $this->notification([
                                    'title'       => __('messages.t_success'),
                                    'description' => __('messages.t_ur_bid_has_been_posted_pending_approval'),
                                    'icon'        => 'success'
                                ]);

                                break;

                            // Pending payment
                            case 'pending_payment':
                                
                                $this->notification([
                                    'title'       => __('messages.t_success'),
                                    'description' => __('messages.t_ur_bid_has_been_posted_pending_payment'),
                                    'icon'        => 'success'
                                ]);

                                break;
                            
                            default:
                                # code...
                                break;
                        }

                    }

                }

            }
            
            // Check second step
            if ($this->bid_current_step === 2) {
                
                $response = $this->bid();

                // Reset bidding form
                $this->reset([
                    'bid_amount',
                    'bid_amount_paid',
                    'bid_days',
                    'bid_description',
                    'bid_sponsored',
                    'bid_sealed',
                    'bid_highlight',
                    'bid_current_step'
                ]);

                // Close modal
                $this->dispatchBrowserEvent('close-modal', 'modal-bid-container');

                // Return response depends on bid's status
                if (isset($response['status'])) {
                    
                    // Check status
                    switch ($response['status']) {

                        // Active
                        case 'active':
                            
                            $this->notification([
                                'title'       => __('messages.t_success'),
                                'description' => __('messages.t_ur_bid_has_been_posted'),
                                'icon'        => 'success'
                            ]);

                            break;

                        // Pending approval
                        case 'pending_approval':
                            
                            $this->notification([
                                'title'       => __('messages.t_success'),
                                'description' => __('messages.t_ur_bid_has_been_posted_pending_approval'),
                                'icon'        => 'success'
                            ]);

                            break;

                        // Pending payment
                        case 'pending_payment':
                            
                            $this->notification([
                                'title'       => __('messages.t_success'),
                                'description' => __('messages.t_ur_bid_has_been_posted_pending_payment'),
                                'icon'        => 'success'
                            ]);

                            break;

                        // Error
                        case 'error':
                            
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => $response['message'],
                                'icon'        => 'error'
                            ]);

                            break;
                        
                        default:
                            # code...
                            break;
                    }

                }

                // If pending payment, redirect to payment url
                if (isset($response['redirect'])) {
                    
                    // Go to payment url
                    return redirect('seller/projects/bids/checkout/' . $response['redirect']);

                }

            }


        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Create new bid
     *
     * @return void
     */
    private function bid()
    {
        try {
            
            // Get settings
            $settings = settings('projects');
    
            // Check if promoting bids enabled
            if ($settings->is_premium_bidding) {
                
                // Check if user selected sealed upgrade
                if ($this->bid_sealed) {
                    
                    // Get sealed upgrade
                    $upgrade_sealed = ProjectBiddingPlan::whereUid($this->bid_sealed)->wherePlanType('sealed')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_sealed = null;
    
                }
    
                // Check if user selected sponsored upgrade
                if ($this->bid_sponsored && !$this->hasSponsoredBid()) {
                    
                    // Get sponsored upgrade
                    $upgrade_sponsored = ProjectBiddingPlan::whereUid($this->bid_sponsored)->wherePlanType('sponsored')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_sponsored = null;
    
                }
    
                // Check if user selected highlight upgrade
                if ($this->bid_highlight) {
                    
                    // Get highlight upgrade
                    $upgrade_highlight = ProjectBiddingPlan::whereUid($this->bid_highlight)->wherePlanType('highlight')->first();
    
                } else {
    
                    // Not selected
                    $upgrade_highlight = null;
    
                }
    
            } else {
    
                // Not enabled, so not upgrades
                $upgrade_sponsored = null;
                $upgrade_sealed    = null;
                $upgrade_highlight = null;
    
            }
    
            // Get status of this bid
            if ($settings->is_premium_bidding && ($upgrade_sponsored || $upgrade_sealed || $upgrade_highlight)) {
    
                // Pending payment
                $status = 'pending_payment';
    
            } else if (!$settings->auto_approve_bids) {
                
                // Pending approval
                $status = 'pending_approval';
    
            } else {
    
                // Active
                $status = 'active';
    
            }
            
            // Create a new bid
            $bid               = new ProjectBid();
            $bid->uid          = strtolower(uid());
            $bid->project_id   = $this->project->id;
            $bid->user_id      = auth()->id();
            $bid->amount       = $this->bid_amount;
            $bid->days         = $this->bid_days;
            $bid->message      = clean($this->bid_description);
            $bid->is_sponsored = $upgrade_sponsored ? true : false;
            $bid->is_sealed    = $upgrade_sealed ? true : false;
            $bid->is_highlight = $upgrade_highlight ? true : false;
            $bid->status       = $status;
            $bid->save();
    
            // If pending payment, we have to create a payment link
            if ($status === 'pending_payment') {
                
                // Set empty amount variable
                $amount = 0;
                
                // Let's check if there is sealed upgrade selected
                if ($upgrade_sealed) {
                    $amount += convertToNumber($upgrade_sealed->price);
                }
    
                // Let's check if there is sponsored upgrade selected
                if ($upgrade_sponsored) {
                    $amount += convertToNumber($upgrade_sponsored->price);
                }
    
                // Let's check if there is highlight upgrade selected
                if ($upgrade_highlight) {
                    $amount += convertToNumber($upgrade_highlight->price);
                }
    
                // Generate payment id
                $payment_id      = Str::uuid()->toString();
    
                // Set payment
                $payment         = new ProjectBidUpgrade();
                $payment->bid_id = $bid->id;
                $payment->uid    = $payment_id;
                $payment->amount = $amount;
                $payment->save();
    
                // Set response
                $response = [
                    'success'  => true,
                    'status'   => $status,
                    'redirect' => $payment->uid
                ];
    
            } else {
    
                // Set response
                $response = [
                    'success'  => true,
                    'status'   => $status
                ];
    
            }
    
            // Send notification to employer
            if ($status === 'active') {
                
                // Via web app
                notification([
                    'text'    => 't_u_received_new_bid_on_ur_project',
                    'action'  => url('project/' . $this->project->pid . '/' . $this->project->slug),
                    'user_id' => $this->project->user_id
                ]);

                // Send a notification via email to the employer
                $this->project->client->notify(new NewBidReceived($bid, $this->project));

            }
    
    
            // Send notification to admin if bid pending approval
            if ($bid->status === 'pending_approval') {
                
                // Send notification
                Admin::first()->notify(new BidPendingApproval($bid));
    
            }
    
            // Return the response
            return $response;

        } catch (\Throwable $th) {
            
            // Error
            return [
                'success' => false,
                'status'  => 'error',
                'message' => $th->getLine()
            ];

        }

    }


    /**
     * Check if this project has a sponsored bid
     *
     * @return boolean
     */
    private function hasSponsoredBid()
    {
        // Get any sponsored active bid
        $bid = ProjectBid::whereProjectId($this->project->id)->whereIsSponsored(true)->whereStatus('active')->first();

        // Return 
        return $bid ? $bid : false;
    }


    /**
     * Report this project
     *
     * @return mixed
     */
    public function report()
    {
        try {

            // First user must be authenticated to report this project
            if (!auth()->check()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_pls_login_or_register_report_project'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // So user is online, but we can't let him report his own project
            // In frontend we don't allow that, but we have to be sure in backend as well
            if (auth()->id() == $this->project->client->id) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_cannot_report_ur_own_projects'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // User is able to report this project, but what if he already did that
            $already_reported = ReportedProject::whereUserId(auth()->id())
                                                  ->whereProjectId($this->project->id)
                                                  ->whereIsSeen(false)
                                                  ->first();

            // Let's check that
            if ($already_reported) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_already_reported_this_project'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Validate form
            ReportValidator::validate($this);

            // Create new report
            $report              = new ReportedProject();
            $report->uid         = uid();
            $report->project_id  = $this->project->id;
            $report->user_id     = auth()->id();
            $report->reason      = $this->report_reason;
            $report->description = clean($this->report_description);
            $report->save();

            // Let's reset the report form
            $this->reset(['report_reason', 'report_description']);

            // Now let's send a notification to admin
            Admin::first()->notify(new ProjectReported($this->project, $report));

            // Close the modal
            $this->dispatchBrowserEvent('close-modal', 'modal-report-project-container');

            // Success
            $this->notification([
                'title'       => __('messages.t_tnx_for_the_feedback'),
                'description' => __('messages.t_we_have_received_bid_report_success'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }   
    }


    /**
     * Check if user already submitted a proposal for this bid
     *
     * @return boolean
     */
    private function checkIfAlreadySubmittedBid()
    {
        try {
            
            // Check if user online
            if (auth()->check()) {
                
                // Get proposal
                $proposal                         = ProjectBid::where('project_id', $this->project->id)
                                                                ->where('user_id', auth()->id())
                                                                ->first();

                // Return value
                $this->already_submitted_proposal = $proposal ? true : false;

            } else {

                // Not online
                $this->already_submitted_proposal = false;

            }

        } catch (\Throwable $th) {
            
            // Error
            $this->already_submitted_proposal = false;

        }
    }
    
}