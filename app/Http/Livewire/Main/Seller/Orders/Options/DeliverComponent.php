<?php

namespace App\Http\Livewire\Main\Seller\Orders\Options;

use Livewire\Component;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Models\OrderItemWork;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Models\OrderItemWorkConversation;
use RalphJSmit\Livewire\Urls\Facades\Url;
use App\Notifications\User\Buyer\OrderDelivered;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Seller\Orders\DeliverValidator;
use App\Http\Validators\Main\Seller\Orders\MessageValidator;

class DeliverComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $order;

    public $quick_response;
    public $work;

    public $message;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get user id
        $user_id     = auth()->id();

        // Get order item
        $order       = OrderItem::where('owner_id', $user_id)->where('uid', $id)->with(['gig', 'order'])->firstOrFail();

        // // Order item must be in ['delivered', 'proceeded'] status and not finished yet
        if (!in_array($order->status, ['proceeded', 'delivered'])) {
            return redirect('seller/orders')->with('message', __('messages.t_u_cant_send_delivered_work_anymore_status_wrong'));
        }

        // Set order
        $this->order = $order;
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
        $title       = __('messages.t_deliver_completed_work') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.orders.options.deliver')->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Submit completed work to the buyer
     *
     * @return mixed
     */
    public function submit()
    {
        try {

            // Either quick response or files should be exist in request
            if (!$this->quick_response && !$this->work) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_u_have_to_select_deliverd_work_or_quick_response'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Check if seller already uploaded work before
            if ($this->order->delivered_work) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_looks_like_u_already_uploaded_completed_work'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Validate form
            DeliverValidator::validate($this);

            // Check if request has files
            if ($this->work) {
                
                // Generate a unique name for this file
                $id        = uid(45);
    
                // Get file extension
                $extension = $this->work->extension();

                // Get file mime type
                $mime      = $this->work->getMimeType();

                // Get file size
                $size      = $this->work->getSize();

                // Move this file to local storage
                $this->work->storeAs('orders/delivered_work', "$id.$extension", $disk = 'custom');

                // Set file data
                $file = [
                    'id'        => $id,
                    'extension' => $extension,
                    'mime'      => $mime,
                    'size'      => $size
                ];

            } else {

                // No files selected
                $file = null;

            }

            // Save work
            $work                      = new OrderItemWork();
            $work->uid                 = uid();
            $work->order_item_id       = $this->order->id;
            $work->attached_work       = $file;
            $work->quick_response      = $this->quick_response ? clean($this->quick_response) : null;
            $work->save();

            // Update order item
            $this->order->status       = 'delivered';
            $this->order->delivered_at = now();
            $this->order->save();

            // Refresh this item
            $this->order->refresh();

            // Send notification to buyer
            $this->order->order->buyer->notify( (new OrderDelivered($this->order))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_seller_has_delivered_ur_order',
                'action'  => url('account/orders/files?orderId=' . $this->order->order->uid . '&itemId=' . $this->order->uid),
                'user_id' => $this->order->order->buyer_id,
                'params'  => ['seller' => auth()->user()->username]
            ]);

            // Reset form
            $this->reset(['work', 'quick_response']);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // Refresh
            redirect(Url::current());


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
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }


    /**
     * Re-submit work again
     *
     * @return mixed
     */
    public function resubmit()
    {
        // Check if order item has delivered work
        if ($this->order->delivered_work) {
            
            // Get delivered work
            $work = $this->order->delivered_work;

            // Check if work has files
            if ($work->attached_work) {
                
                // Get file
                $file = public_path('storage/orders/delivered_work/' . $work->attached_work['id'] . '.' . $work->attached_work['extension']);

                // Check if file exists
                if (File::exists($file)) {
                    
                    // Delete file
                    File::delete($file);

                }

            }

            // Delete this files and reset 
            $work->delete();

            // Refresh model
            $this->order->refresh();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // Refresh
            redirect(Url::current());

        }
    }


    /**
     * Send message
     *
     * @return mixed
     */
    public function sendMessage()
    {
        try {

            // Check if order not finished yet
            if ($this->order->is_finished) {
                return;
            }

            // Validate form
            MessageValidator::validate($this);

            // Save message
            $message              = new OrderItemWorkConversation();
            $message->item_id     = $this->order->id;
            $message->seller_id   = $this->order->owner_id;
            $message->buyer_id    = $this->order->order->buyer_id;
            $message->msg_from    = auth()->id();
            $message->msg_content = clean($this->message);
            $message->save();

            // Reset form
            $this->reset('message');

            // Refresh order item
            $this->order->refresh();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
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
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}