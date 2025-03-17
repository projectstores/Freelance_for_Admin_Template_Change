<?php

namespace App\Http\Livewire\Admin\Projects\Milestones;

use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Notifications\User\Employer\ProjectCompleted;
use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Carbon\Carbon;

class MilestonesComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $project;
    public $paid_amount;
    public $payments_in_progress;
    public $expected_delivery_date;

    /**
     * Initialize component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get project
        $project                    = Project::where('uid', $id)
                                                ->with('milestones', function($query) {
                                                    return $query->latest();
                                                })
                                                ->whereHas('milestones')
                                                ->firstOrFail();

        // Set project
        $this->project              = $project;

        // Calculate paid amount
        $this->paid_amount          = $project->milestones->where('status', 'paid')->sum('amount');

        // Calculate payments in progress
        $this->payments_in_progress = $project->milestones->whereIn('status', ['funded', 'request'])->sum('amount');

        // Get awarded bid
        $awarded_bid                = $project->awarded_bid;

        // Set expected delivery date
        try {

            // Convert date
            $format_date                  = new Carbon($awarded_bid->freelancer_accepted_date, config('app.timezone'));

            // Set expected delivery time
            $this->expected_delivery_date = $format_date->addDays($awarded_bid->days);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->expected_delivery_date = null;

        }
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_milestones'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.milestones.milestones')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Confirm fund amount
     *
     * @param string $id
     * @return void
     */
    public function confirmDeposit($id)
    {
        try {
            
            // Get milestone payment
            $payment         = ProjectMilestone::where('project_id', $this->project->id)
                                                ->where('status', 'request')
                                                ->where('uid', $id)
                                                ->firstOrFail();

            // Get cilent
            $employer        = $this->project->client;

            // Get employer available balance
            $available_funds = convertToNumber($employer->balance_available);

            // Get requested amount
            $amount          = convertToNumber($payment->amount);

            // Get commission from employer
            $commission      = convertToNumber($payment->employer_commission);

            // Set total to fund
            $total           = $amount + $commission;

            // Check if employer has money to be funded
            if ($total > $available_funds) {
                
                // Employer does not have money
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_employer_does_not_have_money_to_fund_milestone'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Confirm fund
            $this->dialog()->confirm([
                'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirm_deposit') .'</h1>',
                'description'    => "<div class='leading-relaxed'>" . __('messages.t_confirm_deposit_milestone_subtitle_admin') . "<br></div>
                <div class='rounded border dark:border-secondary-600 my-8'>
                <dl class='divide-y divide-gray-200 dark:divide-gray-600'>
                    <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                        <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_requested_amount') ."</dt>
                        <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($amount, settings('currency')->code, true) ."</dd>
                    </div>  
                    <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                        <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_milestone_employer_fee_name') ."</dt>
                        <dd class='text-sm font-semibold text-green-600 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>+ ". money($commission, settings('currency')->code, true) ."</dd>
                    </div>  
                    <div class='grid grid-cols-3 gap-4 py-3 px-4 bg-gray-100/60 dark:bg-secondary-700 rounded-b'>
                        <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-400 ltr:text-left rtl:text-right'>". __('messages.t_total') ."</dt>
                        <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($total, settings('currency')->code, true) ."</dd>
                    </div>  
                </dl>
                </div>
                ",
                'icon'           => "credit-card",
                'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                'accept'         => [
                    'label'  => __('messages.t_confirm'),
                    'method' => 'deposit',
                    'color'  => 'secondary',
                    'params' => $id
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Deposit amount
     *
     * @param string $id
     * @return void
     */
    public function deposit($id)
    {
        try {
            
            // Get milestone payment
            $payment         = ProjectMilestone::where('project_id', $this->project->id)
                                                ->where('status', 'request')
                                                ->where('uid', $id)
                                                ->firstOrFail();

            // Get cilent
            $employer        = $this->project->client;

            // Get employer available balance
            $available_funds = convertToNumber($employer->balance_available);

            // Get requested amount
            $amount          = convertToNumber($payment->amount);

            // Get commission from employer
            $commission      = convertToNumber($payment->employer_commission);

            // Set total to fund
            $total           = $amount + $commission;

            // Check if employer has money to be funded
            if ($total > $available_funds) {
                
                // Employer does not have money
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_employer_does_not_have_money_to_fund_milestone'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Update milestone status
            $payment->status = "funded";
            $payment->save();

            // Update employer available balance
            $employer->balance_available = convertToNumber($available_funds) - convertToNumber($total);
            $employer->save();

            // Calculate paid amount
            $this->paid_amount           = ProjectMilestone::where('project_id', $this->project->id)
                                                            ->where('status', 'paid')
                                                            ->sum('amount');

            // Calculate payments in progress
            $this->payments_in_progress  = ProjectMilestone::where('project_id', $this->project->id)
                                                            ->whereIn('status', ['funded', 'request'])
                                                            ->sum('amount');

            // Success
            $this->notification([
                'title'       => __('messages.t_status'),
                'description' => __('messages.t_amount_has_been_deposit_milestone_success'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Confirm releasing amount
     *
     * @param string $id
     * @return void
     */
    public function confirmRelease($id)
    {
        try {
            
            // Get milestone payment
            $payment         = ProjectMilestone::where('project_id', $this->project->id)
                                                ->where('status', 'funded')
                                                ->where('uid', $id)
                                                ->firstOrFail();

            // Confirm fund
            $this->dialog()->confirm([
                'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirm_release_of_amount') .'</h1>',
                'description'    => "<div class='leading-relaxed'>" . __('messages.t_confirm_release_milestone_payment') . "</div>",
                'icon'           => "credit-card",
                'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                'accept'         => [
                    'label'  => __('messages.t_confirm'),
                    'method' => 'release',
                    'color'  => 'secondary',
                    'params' => $id
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Release amount
     *
     * @param string $id
     * @return void
     */
    public function release($id)
    {
        try {
            
            // Get milestone payment
            $payment         = ProjectMilestone::where('project_id', $this->project->id)
                                                ->where('status', 'funded')
                                                ->where('uid', $id)
                                                ->firstOrFail();

            // Get project employer
            $employer        = $this->project->client;

            // Update milestone status
            $payment->status = "paid";
            $payment->save();

            // Calculate paid amount
            $this->paid_amount          = ProjectMilestone::where('project_id', $this->project->id)
                                                            ->where('status', 'paid')
                                                            ->sum('amount');

            // Calculate payments in progress
            $this->payments_in_progress = ProjectMilestone::where('project_id', $this->project->id)
                                                            ->whereIn('status', ['funded', 'request'])
                                                            ->sum('amount');

            // Mark project as completed if project budget is paid
            if (convertToNumber($this->paid_amount) >= convertToNumber($this->project->awarded_bid->amount)) {
                
                // Project is completed
                $this->project->status = 'completed';
                $this->project->save();

                // Refresh project
                $this->project->refresh();

                // Send a message to the employer
                $employer->notify(new ProjectCompleted($this->project));
                
                // Send a notification to the freelancer
                notification([
                    'text'    => 't_congts_freelancer_ur_project_completed',
                    'action'  => url('seller/projects/milestones', $this->project->uid),
                    'user_id' => $this->project->awarded_freelancer_id
                ]);

            }

            // Success
            $this->notification([
                'title'       => __('messages.t_status'),
                'description' => __('messages.t_amount_has_been_released_milestone_success'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}
