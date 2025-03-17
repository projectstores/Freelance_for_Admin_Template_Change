<?php

namespace App\Http\Livewire\Main\Account\Verification;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\VerificationCenter;
use App\Utils\Uploader\ImageUploader;
use App\Notifications\Admin\NewIdVerificationPending;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Verification\DocIDValidator;
use App\Http\Validators\Main\Account\Verification\SelfieValidator;
use App\Http\Validators\Main\Account\Verification\DocDriverValidator;
use App\Http\Validators\Main\Account\Verification\DocPassportValidator;

class VerificationComponent extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;

    public $verification;
    public $document_type;
    public $selfie;
    public $currentStep        = 1;
    public $doc_id             = [];
    public $doc_driver_license = [];
    public $doc_passport       = [];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get user verification
        $verification = auth()->user()->verification;

        // Set verification
        $this->verification = $verification ? $verification : false;
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
        $title       = __('messages.t_verification_center') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.verification.verification')->extends('livewire.main.layout.app2')->section('content');
    }


    /**
     * Set document type
     *
     * @return void
     */
    public function setDocumentType()
    {
        // Document type must be id, driver license or passport
        if (!in_array($this->document_type, ['id', 'driver_license', 'passport'])) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_please_select_a_valid_document_type'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Go to next step
        $this->currentStep = 2;
    }


    /**
     * Set document files
     *
     * @return void
     */
    public function setDocumentFiles()
    {
        try {
            
            // Validate files
            switch ($this->document_type) {
                case 'id':
                    DocIDValidator::validate($this);
                    break;
                case 'driver_license':
                    DocDriverValidator::validate($this);
                    break;
                case 'passport':
                    DocPassportValidator::validate($this);
                    break;
            }

            // Go to next step
            $this->currentStep = 3;

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Finish verification
     *
     * @return void
     */
    public function finish()
    {
        try {
            
            // Validate selfie photo
            SelfieValidator::validate($this);

            // Get user id
            $user_id = auth()->id();

            // Check if document (id)
            if ($this->document_type === 'id') {
                
                // Upload front side
                $front_side_id = ImageUploader::make($this->doc_id['front'])
                                              ->folder('verifications')
                                              ->handle();

                // Upload back side
                $back_side_id  = ImageUploader::make($this->doc_id['back'])
                                              ->folder('verifications')
                                              ->handle();

            } elseif ($this->document_type === 'driver_license') {
                
                // Upload front side
                $front_side_id = ImageUploader::make($this->doc_driver_license['front'])
                                              ->folder('verifications')
                                              ->handle();

                // Upload back side
                $back_side_id  = ImageUploader::make($this->doc_driver_license['back'])
                                              ->folder('verifications')
                                              ->handle();

            } elseif ($this->document_type === 'passport') {
                
                // Upload front side
                $front_side_id = ImageUploader::make($this->doc_passport['front'])
                                              ->folder('verifications')
                                              ->handle();

                // No back side for passport
                $back_side_id  = null;

            }

            // Save selfie
            $selfie                        = ImageUploader::make($this->selfie)
                                                            ->folder('verifications')
                                                            ->handle();

            // Save verification
            $verification                  = new VerificationCenter();
            $verification->uid             = uid();
            $verification->user_id         = $user_id;
            $verification->document_type   = $this->document_type;
            $verification->file_front_side = $front_side_id;
            $verification->file_back_side  = $back_side_id;
            $verification->file_selfie     = $selfie;
            $verification->save();

            // Send notification to admin
            Admin::first()->notify(new NewIdVerificationPending());

            // Success, now refresh page
            $this->dispatchBrowserEvent('refresh');

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Go back
     *
     * @return void
     */
    public function back()
    {
        // Check if not first step
        if ($this->currentStep !== 1) {
            $this->currentStep -= 1;
        }
    }


    /**
     * Start again and send files
     *
     * @return void
     */
    public function sendFilesAgain()
    {
        // Check if verification already declined
        if ($this->verification && $this->verification->status === 'declined') {
            
            // Delete verification
            $this->verification->delete();

            // Success, now refresh page
            $this->dispatchBrowserEvent('refresh');

        }

    }
    
}
