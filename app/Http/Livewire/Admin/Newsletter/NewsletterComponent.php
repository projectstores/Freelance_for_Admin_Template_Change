<?php

namespace App\Http\Livewire\Admin\Newsletter;

use Mail;
use Excel;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\NewsletterList;
use App\Exports\NewsletterExport;
use App\Models\NewsletterVerification;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Mail\User\Everyone\NewsletterVerification as EveryoneNewsletterVerification;

class NewsletterComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_newsletter'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.newsletter.newsletter', [
            'lists' => $this->lists
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of newsletter lists
     *
     * @return object
     */
    public function getListsProperty()
    {
        return NewsletterList::latest()->paginate(42);
    }


    /**
     * Export emails
     *
     * @param string $type
     * @return void
     */
    public function export($type)
    {
        // Check type of export
        if (!in_array($type, ['all', 'pending', 'verified'])) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_pls_select_export_type'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Export data
        return Excel::download(new NewsletterExport($type), 'data.xlsx');
    }


    /**
     * Resend verification token
     *
     * @param integer $id
     * @return void
     */
    public function resend($id)
    {
        // Get list
        $list = NewsletterList::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Delete old verifications
        NewsletterVerification::where('list_id', $list->id)->delete();

        // Generate new verification token
        $verification          = new NewsletterVerification();
        $verification->list_id = $list->id;
        $verification->token   = uid(60);
        $verification->save();

        // Send verification message again
        Mail::to($list->email)->send(new EveryoneNewsletterVerification($verification->token));

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_a_verification_link_sent_to_this_email'),
            'icon'        => 'success'
        ]);
    }


    /**
     * delete email from list
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get list
        $list = NewsletterList::where('id', $id)->firstOrFail();

        // Delete verification tokens
        NewsletterVerification::where('list_id', $list->id)->delete();

        // Delete email
        $list->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_email_newsletter_deleted_success'),
            'icon'        => 'success'
        ]);
    }
    
}
