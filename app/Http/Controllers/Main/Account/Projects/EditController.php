<?php
 
namespace App\Http\Controllers\Main\Account\Projects;
 
use App\Models\Project;
use App\Models\ProjectPlan;
use Illuminate\Support\Str;
use App\Models\ProjectSkill;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Models\ProjectSettings;
use App\Models\ProjectSubscription;
use App\Http\Controllers\Controller;
use App\Models\ProjectRequiredSkill;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Main\Post\ProjectRequest;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditController extends Controller
{
    use SEOToolsTrait;
   
    public $project;

    /**
     * Show edit project form
     *
     * @return View
     */
    public function form($id)
    {
        // Check projects enabled
        if (!settings('projects')->is_enabled) {
            return redirect('/');
        }

        // Get project
        $project         = Project::where('uid', $id)
                                    ->where('user_id', auth()->id())
                                    ->whereIn('status', ['pending_approval', 'pending_payment', 'active', 'rejected'])
                                    ->with(['skills.skill'])
                                    ->firstOrFail();

        // Set project
        $this->project   = $project;

        // Get currency settings
        $currency        = settings('currency');

        // Get currency symbol
        $currency_symbol = config('money.' . strtoupper($currency->code))['symbol'];

        // Get projects categories
        $categories      = $this->categories();

        // Get projects plans
        $plans           = $this->plans();

        // Get settings
        $settings        = $this->settings();

        // Set page seo
        $this->setSeo();

        // Return view
        return view('livewire.main.account.projects.options.edit', [
            'categories'      => $categories,
            'currency_symbol' => $currency_symbol,
            'plans'           => $plans,
            'settings'        => $settings,
            'project'         => $project
        ]);
    }


    /**
     * Update project
     *
     * @param ProjectRequest $request
     * @return mixed
     */
    public function update(ProjectRequest $request, $id)
    {
        
        // Must be an ajax request
        if ($request->ajax()) {
            
            try {
                
                // Get projects settings
                $settings = settings('projects');

                // Get user
                $user     = auth()->user();

                // First let's check if projects section is enabled
                if (!$settings->is_enabled) {
                    return;
                }

                // Get project
                $project         = Project::where('uid', $id)
                                        ->where('user_id', auth()->id())
                                        ->whereIn('status', ['pending_approval', 'pending_payment', 'active', 'rejected'])
                                        ->with(['skills.skill'])
                                        ->firstOrFail();

                // Check if recaptcha enabled
                if (settings('security')->is_recaptcha) {
                
                    try {
                        
                        // Get recaptcha secret key
                        $recaptcha_secret           = config('recaptcha.secret_key');
        
                        // post request to server
                        $verify_recaptcha_url       = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($recaptcha_secret) .  '&response=' . urlencode($request->get('recaptcha_token'));
        
                        // Get recaptcha response
                        $recaptcha_response         = file_get_contents($verify_recaptcha_url);
        
                        // Convert response to json
                        $recaptcha_decoded_response = json_decode($recaptcha_response, true);
        
                        // should return JSON with success as true
                        if(!isset($recaptcha_decoded_response["success"])) {
                            
                            // Spam detected
                            return response()->json([
                                'message' => __('messages.t_recaptcha_error_message')
                            ], 422);
        
                        }
        
                    } catch (\Throwable $th) {
        
                        // Spam detected
                        return response()->json([
                            'message' => __('messages.t_recaptcha_error_message')
                        ], 422);
        
                        return;
                        
                    }
    
                }

                // Max price must be greater than min price
                if (convertToNumber($request->get('price_min')) >= convertToNumber($request->get('price_max'))) {
                    
                    // Error
                    return response()->json([
                        'message' => __('messages.t_max_project_price_must_be_greater')
                    ], 422);

                }

                // Get skills
                $skills                  = $request->get('skills', []);

                // Get title
                $title                   = clean($request->get('title'));

                // Generate project slug
                $slug                    = substr( Str::slug($title), 0, 160 );

                // Get project status
                $status                  = $this->status($request, $settings);

                // Get premium options
                $premium                 = $this->premium($request, $settings);
                
                // Update project
                $project->title          = clean($request->get('title'));
                $project->description    = clean($request->get('description'));
                $project->slug           = $slug;
                $project->category_id    = $request->get('category');
                $project->budget_min     = $request->get('price_min');
                $project->budget_max     = $request->get('price_max');
                $project->budget_type    = $request->get('salary_type');
                $project->is_featured    = $premium['is_featured'] ?? $project->is_featured ;
                $project->is_urgent      = $premium['is_urgent'] ?? $project->is_urgent;
                $project->is_highlighted = $premium['is_highlighted'] ?? $project->is_highlighted;
                $project->is_alert       = $premium['is_alert'] ?? $project->is_alert;
                $project->status         = $status;
                $project->save();

                // Create a subscription if user selected premium posting
                if ($settings->is_premium_posting && is_array($request->get('plans', [])) && count($request->get('plans', []))) {
                    
                    // Delete old subscription
                    ProjectSubscription::where('project_id', $project->id)->delete();

                    // Save new subscription
                    $subscription             = new ProjectSubscription();
                    $subscription->uid        = Str::uuid()->toString();
                    $subscription->project_id = $project->id;
                    $subscription->total      = $premium['total'];
                    $subscription->save();

                } else {

                    // No subscription
                    $subscription = false;

                }

                // Delete old required skills
                ProjectRequiredSkill::where('project_id', $project->id)->delete();
                
                // Loop through skills
                foreach ($skills as $s) {
                    
                    // Save skill
                    $skill             = new ProjectRequiredSkill();
                    $skill->project_id = $project->id;
                    $skill->skill_id   = $s;
                    $skill->save();

                }

                // Check if payment required, redirect to payment link
                if ($subscription) {
                    
                    // Flash a success message
                    session()->flash('success', __('messages.t_ur_project_created_and_pending_payment'));

                    // Redirect
                    return response()->json([
                        'redirect' => url('account/projects/checkout', $subscription->uid)
                    ], 200);

                }

                // Flash a message
                session()->flash('success', $status === 'pending_approval' ? __('messages.t_ur_project_created_and_pending_approval') : __('messages.t_ur_project_created_success'));

                // No payment, send success message
                return response()->noContent();

            } catch (\Throwable $th) {

                // Something went wrong
                return response()->json($th->getMessage(), 422);
                
            }

        }

    }


    /**
     * Get skills by category
     *
     * @param Request $request
     * @return object
     */
    public function skills(Request $request)
    {
        // Get category
        $category_id = $request->get('category');

        // Get skills
        $skills      = ProjectSkill::where('category_id', $category_id)->orderBy('name', 'desc')->get();

        // Return back skills
        return response()->json($skills);
    }


    /**
     * Get projects categories
     *
     * @return array
     */
    private function categories()
    {
        // Set empty array
        $data       = [];

        // Get categories
        $categories = ProjectCategory::get();

        // Loop through categories
        foreach ($categories as $c) {
            
            // Set category details
            $category = [
                'id' => $c->id,
                'name' => category_title('projects', $c)
            ];

            // Add it to empty array above
            array_push($data, $category);

        }

        // Return categories
        return $data;
    }


    /**
     * Get projects plans
     *
     * @return object
     */
    private function plans()
    {
        return ProjectPlan::orderBy('title', 'asc')
                                    ->where('is_active', true)
                                    ->select(
                                        'title',
                                        'id', 
                                        'description',
                                        'price',
                                        'days',
                                        'type',
                                        'badge_text_color as text_color',
                                        'badge_bg_color as bg_color'
                                    )
                                    ->get();
    }


    /**
     * Get projects settings
     *
     * @return object
     */
    private function settings()
    {
        return ProjectSettings::select(
            'id',
            'is_free_posting as is_free',
            'is_premium_posting as is_premium',
            'commission_type',
            'commission_from_publisher as commission_value',
            'max_skills'
        )->first();
    }


    /**
     * Get project status
     *
     * @param object $request
     * @param object $settings
     * @return string
     */
    private function status($request, $settings)
    {
        // Get selected plans
        $selected_plans = $request->get('plans', []);

        // Check if has plans
        if (is_array($selected_plans) && count($selected_plans)) {
            
            // Pending payment
            return 'pending_payment';

        } else {

            // Check if auto approval enabled
            if ($settings->auto_approve_projects) {
                
                // Active
                return 'active';

            }

            // Pending approval
            return 'pending_approval';

        }
    }


    /**
     * Get premium options
     *
     * @param object $request
     * @param object $settings
     * @return array
     */
    private function premium($request, $settings)
    {
        // Check if premium posting enabled
        if ($settings->is_premium_posting) {
            
            // Get selected plans
            $selected_plans = $request->get('plans', []);

            // Check if has any plan
            if (is_array($selected_plans) && count($selected_plans)) {
                
                // Get plans
                $plans = ProjectPlan::whereIn('id', $selected_plans)->whereIsActive(true)->get();

                // Check if these plans exist
                if ($plans->count()) {
                    
                    // Convert plans to array
                    $plans_to_array = $plans->toArray();

                    // Check if featured plan select
                    if (array_search('featured', array_column($plans_to_array, 'type')) !== false) {
                        $featured = $plans_to_array[array_search('featured', array_column($plans_to_array, 'type'))];
                    } else {
                        $featured = false;
                    }

                    // Check if urgent plan select
                    if (array_search('urgent', array_column($plans_to_array, 'type')) !== false) {
                        $urgent = $plans_to_array[array_search('urgent', array_column($plans_to_array, 'type'))];
                    } else {
                        $urgent = false;
                    }

                    // Check if highlighted plan select
                    if (array_search('highlight', array_column($plans_to_array, 'type')) !== false) {
                        $highlighted = $plans_to_array[array_search('highlight', array_column($plans_to_array, 'type'))];
                    } else {
                        $highlighted = false;
                    }

                    // Check if alert plan select
                    if (array_search('alert', array_column($plans_to_array, 'type')) !== false) {
                        $alert = $plans_to_array[array_search('alert', array_column($plans_to_array, 'type'))];
                    } else {
                        $alert = false;
                    }

                    // Calculate total price
                    $total = array_sum(array_column($plans_to_array, 'price'));
                    
                    // Return premium options
                    return [
                        'is_featured'    => $featured ? true : false,
                        'is_urgent'      => $urgent ? true : false,
                        'is_highlighted' => $highlighted ? true : false,
                        'is_alert'       => $alert ? true : false,
                        'total'          => $total
                    ];

                } else {

                    // No plan found
                    return [
                        'is_featured'    => false,
                        'is_urgent'      => false,
                        'is_highlighted' => false,
                        'is_alert'       => false,
                        'total'          => 0
                    ];

                }

            } else {

                // No plan selected
                return [
                    'is_featured'    => false,
                    'is_urgent'      => false,
                    'is_highlighted' => false,
                    'is_alert'       => false,
                    'total'          => 0
                ];

            }

        } else {
            
            // Premium posting not enabled
            return [
                'is_featured'    => false,
                'is_urgent'      => false,
                'is_highlighted' => false,
                'is_alert'       => false,
                'total'          => 0
            ];

        }
        
    }


    /**
     * Set page seo
     *
     * @return void
     */
    private function setSeo()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_edit_project') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
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
    }

}