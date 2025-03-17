<?php

namespace App\Http\Livewire\Main\Account\Orders\Options;

use Exception;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\OrderItemRequirement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RequirementsComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $orderId;
    public $itemId;
    public $order;
    public $item;
    public $requirements   = [];
    protected $queryString = [
        'orderId' => ['as' => 'order'],
        'itemId'  => ['as' => 'item'],
    ];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get user id
        $user_id     = auth()->id();

        // Get order
        $order       = Order::where('uid', $this->orderId)->where('buyer_id', $user_id)->firstOrFail();

        // Check if invoice paid
        if ($order->invoice->status === 'pending') {
            
            // Error
            return redirect('account/orders')->with('message', __('messages.t_we_are_waiting_for_payment_first'));

        }

        // Set order
        $this->order = $order;

        // Get item
        $item        = OrderItem::where('uid', $this->itemId)->where('order_id', $order->id)->firstOrFail();

        // User can send requirements only when item status is pending or in progress
        if ($item->status === 'pending' || $item->status === 'proceeded') {

            // Set item
            $this->item  = $item;

        } else {
            return redirect('account/orders')->with('message', __('messages.t_u_cant_submit_requirements_for_item'));
        }
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
        $title       = __('messages.t_submit_required_info') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.orders.options.requirements')->extends('livewire.main.layout.app')->section('content');
    }

    
    /**
     * Submit required files to seller
     *
     * @return mixed
     */
    public function submit()
    {
        try {

            // Check if user already submitted the required information
            if ($this->item->is_requirements_sent && $this->item->requirements()->count()) {
                
                // Show error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_user_already_submitted_requirements'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get requirements from database for this item
            $requirements = $this->item->gig->requirements;

            // Validate fields
            $this->isValid($requirements);

            // Loop through requirements in database
            foreach ($requirements as $requirement) {
                
                // Get value of this requirement in database
                $value = $this->isExists($requirement);

                // Check if user set the item
                if (!is_bool($value)) {
                    // Check type of this requirement
                    if ($requirement->type === 'text') {
                        
                        // Save requirement
                        OrderItemRequirement::create([
                            'item_id'    => $this->item->id,
                            'question'   => $requirement->question,
                            'form_type'  => $requirement->type,
                            'form_value' => $value
                        ]);
    
                    } elseif ($requirement->type === 'choice') {
                        
                        // Save requirement
                        OrderItemRequirement::create([
                            'item_id'    => $this->item->id,
                            'question'   => $requirement->question,
                            'form_type'  => $requirement->type,
                            'form_value' => $value
                        ]);
    
                    } elseif ($requirement->type === 'file') {
                        
                        // Generate file id
                        $id        = uid(45);
    
                        // Get file extension
                        $extension = $value->extension();
    
                        // Get file mime type
                        $mime      = $value->getMimeType();
    
                        // Get file size
                        $size      = $value->getSize();
    
                        // Move this file to local storage
                        $value->storeAs('orders/requirements', "$id.$extension", $disk = 'custom');
    
                        // Set file data
                        $file = [
                            'id'        => $id,
                            'extension' => $extension,
                            'mime'      => $mime,
                            'size'      => $size
                        ];
    
                        // Save requirement in database
                        OrderItemRequirement::create([
                            'item_id'    => $this->item->id,
                            'question'   => $requirement->question,
                            'form_type'  => $requirement->type,
                            'form_value' => $file
                        ]);
    
                    }
                }

            }

            // Let' update item information
            $this->item->is_requirements_sent   = true;
            $this->item->expected_delivery_date = $this->calculateExpectedDeliveryDate();
            $this->item->save();

            // Now let's refresh the item
            $this->item->refresh();

            // And reset the requirements form
            $this->reset('requirements');

            // Success
            if (count($this->requirements)) {
                
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_required_info_submitted_success'),
                    'icon'        => 'success'
                ]);

            }

        } catch (Exception $e) {

            // Check exeption message
            switch ($e->getMessage()) {
                
                // Input not exists in request
                case 'REQUIRED_INPUT_NOT_EXISTS_IN_REQUEST':
                    
                    // Show error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_exception_REQUIRED_INPUT_NOT_EXISTS_IN_REQUEST'),
                        'icon'        => 'error'
                    ]);

                    break;

                // Input text length validation failed
                case 'REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED':
                    
                    // Show error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_exception_REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED'),
                        'icon'        => 'error'
                    ]);

                    break;
                
                // Required multiple choice not exists in db
                case 'REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS':
                    
                    // Show error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_exception_REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS'),
                        'icon'        => 'error'
                    ]);

                    break;

                // Required radio option not exists in db
                case 'REQUIRED_CHOICE_VALUE_NOT_EXISTS':
                    
                    // Show error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_exception_REQUIRED_CHOICE_VALUE_NOT_EXISTS'),
                        'icon'        => 'error'
                    ]);

                    break;

                // Validation failed on file
                case 'REQUIRED_FILE_VALIDATION_FAILED':
                    
                    // Show error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_exception_REQUIRED_FILE_VALIDATION_FAILED'),
                        'icon'        => 'error'
                    ]);

                    break;
                
                default:
                    throw $e;
                    break;
            }

        }
    }


    /**
     * Re-submit the required info to seller
     *
     * @return mixed
     */
    public function resubmit()
    {
        try {
            
            // Check if user already submitted the required info
            if ($this->item->is_requirements_sent) {
                
                // Loop through required info
                foreach ($this->item->requirements as $requirement) {
                    
                    // Check if type file
                    if ($requirement->form_type === 'file') {

                        // Get file path
                        $file = public_path('storage/orders/requirements/' . $requirement->form_value['id'] . '.' . $requirement->form_value['extension']);

                        // We have to delete file from local storage
                        if (File::exists($file)) {
                            File::delete($file);
                        }
                        
                    }

                    // Delete requirement
                    $requirement->delete();

                }

                // We have to reset expected delivery date
                $this->item->expected_delivery_date = null;
                $this->item->is_requirements_sent   = false;
                $this->item->save();

                // Refresh item
                $this->item->refresh();

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_resubmit_requirements_success_msg'),
                    'icon'        => 'success'
                ]);

            } else {

                // Not yet
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_didnt_submit_any_info_yet_requirements'),
                    'icon'        => 'error'
                ]);

                return;

            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Check if form valid to continue request
     *
     * @param object $requirements
     * @return boolean
     */
    private function isValid($requirements)
    {
        // Get settings media
        $settings_media     = settings('media');

        // Get maximum required file size
        $max_file_size      = $settings_media->requirements_file_max_size * 1024;

        // Get allowed extension
        $allowed_extensions = $settings_media->requirements_file_allowed_extensions;

        // Loop through requirements in database
        foreach ($requirements as  $requirement) {
            
            // Check if requirement required
            if ($requirement->is_required) {
                
                // Requirement must be exists in request
                $isExists = $this->isExists($requirement);

                // Check if exists
                if ($isExists) {
                    
                    // Check type of this requirement
                    if ($requirement->type === 'text') {
                        
                        // Get text length
                        $text_length = strlen($isExists);

                        // Check if the user submitted this text input
                        if ($text_length < 1 || $text_length > 500) {

                            // Throw error
                            throw new Exception('REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED');

                        }

                    } elseif ($requirement->type === 'choice') {
                        
                        // Check choice type
                        if ($requirement->is_multiple) {
                            
                            // Multiple options allowed but they must be exist in database
                            $value_exist_in_db = $requirement->options->whereIn('option', $isExists)->first();

                            // Must be exists
                            if (!$value_exist_in_db) {
                                
                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS');

                            }

                        } else {

                            // Only one value and must be exists in database
                            $is_value_exists_in_db = $requirement->options->where('option', $isExists)->first();

                            // Must be exists
                            if (!$is_value_exists_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_VALUE_NOT_EXISTS');

                            }

                        }

                    } elseif ($requirement->type === 'file') {
                        
                        // Let's validate file
                        $validator = Validator::make(['file' => $isExists], [
                            'file' => "required|file|max:$max_file_size|mimes:$allowed_extensions",
                        ]);
                 
                        // Validator fails
                        if ($validator->fails()) {

                            // Throw error
                            throw new Exception('REQUIRED_FILE_VALIDATION_FAILED');

                        }

                    } else {

                        // Something not right
                        return false;

                    }

                } else {
                    
                    // Throw error
                    throw new Exception('REQUIRED_INPUT_NOT_EXISTS_IN_REQUEST');

                }

            } else {

                // Requirement input not required, but if exists in request, we have to validate it
                $isExists = $this->isExists($requirement);

                // Check if exists
                if ($isExists) {
                    
                    // Check type of this requirement
                    if ($requirement->type === 'text') {
                        
                        // Get text length
                        $text_length = strlen($isExists);

                        // Check if the user submitted this text input
                        if ($text_length < 1 || $text_length > 500) {

                            // Throw error
                            throw new Exception('REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED');

                        }

                    } elseif ($requirement->type === 'choice') {
                        
                        // Check choice type
                        if ($requirement->is_multiple) {
                            
                            // Multiple options allowed but they must be exist in database
                            $value_exist_in_db = $requirement->options->whereIn('option', $isExists)->first();

                            // Must be exists
                            if (!$value_exist_in_db) {
                                
                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS');

                            }

                        } else {

                            // Only one value and must be exists in database
                            $is_value_exists_in_db = $requirement->options->where('option', $isExists)->first();

                            // Must be exists
                            if (!$is_value_exists_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_VALUE_NOT_EXISTS');

                            }

                        }

                    } elseif ($requirement->type === 'file') {
                        
                        // Let's validate file
                        $validator = Validator::make(['file' => $isExists], [
                            'file' => "required|file|max:$max_file_size|mimes:$allowed_extensions",
                        ]);
                 
                        // Validator fails
                        if ($validator->fails()) {

                            // Throw error
                            throw new Exception('REQUIRED_FILE_VALIDATION_FAILED');

                        }

                    } else {

                        // Something not right
                        return false;

                    }

                }

            }

        }
    }


    /**
     * Check if requirement exists in request
     *
     * @param object $requirement
     * @return mixed
     */
    private function isExists($requirement)
    {
        // Check if required input exists
        if (array_key_exists($requirement->id, $this->requirements)) {
            
            // Return the value
            return $this->requirements[$requirement->id]['value'];

        }

        // Not found 
        return false;
    }


    /**
     * Caculate expected delivery date
     *
     * @param object $item
     * @return string
     */
    private function calculateExpectedDeliveryDate()
    {
        // Set empty days variable
        $days  = 0;

        // Culculate extra days for upgrades
        $days += $this->item->upgrades()->exists() ? $this->item->upgrades->sum('extra_days') : 0;

        // Add gig delivery time
        $days += $this->item->gig->delivery_time;

        // Calculate expected delivery date
        return now()->addDays($days);
    }
    
}