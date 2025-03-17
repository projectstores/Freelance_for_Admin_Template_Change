<?php

namespace App\Http\Livewire\Admin\Gigs\Options\Steps;

use App\Models\Gig;
use Livewire\Component;
use App\Models\GigImage;
use WireUi\Traits\Actions;
use App\Models\GigDocument;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Gigs\Edit\GalleryValidator;

class Gallery extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;
    
    public $images    = [];
    public $documents = [];
    public $video_link;
    public $video_id;
    public $thumbnail;

    public $gig;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount(Gig $gig)
    {
        // Set gig
        $this->gig = $gig;

        // Fill form
        $this->fill([
            'video_id'   => $gig->video_id,
            'video_link' => $gig->video_link
        ]);
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_gallery'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.gigs.options.steps.gallery');
    }


    /**
     * Add a youtube video
     *
     * @return void
     */
    public function addVideo()
    {
        // Set regex to validate youtube video
        $rx = '~
                ^(?:https?://)?                          # Optional protocol
                (?:www[.])?                              # Optional sub-domain
                (?:youtube[.]com/watch[?]v=|youtu[.]be/) # Mandatory domain name (w/ query string in .com)
                ([^&]{11})                               # Video id of 11 characters as capture group 1
                    ~x';

        // Validate url
        $has_match = preg_match($rx, $this->video_link, $matches);
        
        // Check if video is valid
        if (isset($matches[1])) {
            
            // Now we have to check if video really exists or not
            $headers = get_headers('https://www.youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=' . $matches[1]);

                if(is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false){
                    
                    // Video exists
                    $this->notification([
                        'title'       => __('messages.t_success'),
                        'description' => __('messages.t_youtube_video_has_been_successfully_added'),
                        'icon'        => 'success'
                    ]);

                    // Close modal
                    $this->dispatchBrowserEvent('close-modal', 'modal-add-youtube-video-container');

                } else {
                    
                    // Video not exists, reset form
                    $this->reset('video_link');

                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_youtube_video_not_exists'),
                        'icon'        => 'error'
                    ]);

                    return;

                }

        } else {

            // Video not valid, reset form
            $this->reset('video_link');

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_youtube_video_invalid'),
                'icon'        => 'error'
            ]);

            return;

        }
    }


    /**
     * Remove video
     *
     * @return void
     */
    public function removeVideo()
    {
        // Reset video form
        $this->reset('video_link');
    }


    /**
     * Go back to preview step
     *
     * @return void
     */
    public function back()
    {
        // Go back to preview step
        return redirect( config('global.dashboard_prefix') . "/gigs/edit/" . $this->gig->uid . "?step=requirements" );

    }


    /**
     * Delete image from gallery
     *
     * @param integer $id
     * @return void
     */
    public function removeImage($id)
    {
        // Get image
        $image = GigImage::where('id', $id)->where('gig_id', $this->gig->id)->firstOrFail();

        // Delete images from local/server sides
        deleteModelFile($image->small);
        deleteModelFile($image->medium);
        deleteModelFile($image->large);

        // Now delete image
        $image->delete();

        // Refresh gig
        $this->gig->refresh();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_file_has_been_successfully_deleted'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Remove document
     *
     * @param integer $id
     * @return void
     */
    public function removeDocument($id)
    {
        // Get document
        $document = GigDocument::where('id', $id)->where('gig_id', $this->gig->id)->firstOrFail();

        // Get file path
        $path     = public_path('storage/gigs/documents/' . $document->uid . '.pdf');

        // Check if file exists
        if (File::exists($path)) {
            
            // Delete file from local storage
            File::delete($path);

        }

        // Delete document
        $document->delete();

        // Refresh gig
        $this->gig->refresh();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_file_has_been_successfully_deleted'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Save gallery data section
     *
     * @return void
     */
    public function save()
    {
        try {

            // Validate form
            GalleryValidator::all($this);

            // Check if request has thumbnail image
            if ($this->thumbnail) {

                // Upload new files
                $image_thumb_id  = ImageUploader::make($this->thumbnail)
                                                ->deleteById($this->gig->image_thumb_id)
                                                ->resize(400)
                                                ->folder('gigs/previews/small')
                                                ->handle();
                $image_medium_id = ImageUploader::make($this->thumbnail)
                                                ->deleteById($this->gig->image_medium_id)
                                                ->resize(800)
                                                ->folder('gigs/previews/medium')
                                                ->handle();
                $image_large_id  = ImageUploader::make($this->thumbnail)
                                                ->deleteById($this->gig->image_large_id)
                                                ->resize(1200)
                                                ->folder('gigs/previews/large')
                                                ->handle();

            } else {

                // Set default values
                $image_thumb_id  = $this->gig->image_thumb_id;
                $image_medium_id = $this->gig->image_medium_id;
                $image_large_id  = $this->gig->image_large_id;

            }

            // Update gig
            $this->gig->video_id        = $this->video_link ? youtubeId($this->video_link) : $this->video_id;
            $this->gig->video_link      = $this->video_link;
            $this->gig->image_thumb_id  = $image_thumb_id;
            $this->gig->image_medium_id = $image_medium_id;
            $this->gig->image_large_id  = $image_large_id;
            $this->gig->save();

            // Check if request has new gallery images
            if (is_array($this->images) && count($this->images)) {
                
                // Loop through old images
                foreach ($this->gig->images as $image) {
                    
                    // Delete files
                    deleteModelFile($image->small);
                    deleteModelFile($image->medium);
                    deleteModelFile($image->large);

                }

                // Delete old gallery
                GigImage::where('gig_id', $this->gig->id)->delete();

                // Upload new images
                foreach ($this->images as $image) {
                
                    // Upload small image
                    $thumb_id  = ImageUploader::make($image)->resize(400)->folder('gigs/gallery/small')->handle();
    
                    // Upload medium image
                    $medium_id = ImageUploader::make($image)->resize(800)->folder('gigs/gallery/medium')->handle();
    
                    // Upload large image
                    $large_id  = ImageUploader::make($image)->resize(1200)->folder('gigs/gallery/large')->handle();
    
                    // Save images
                    GigImage::create([
                        'gig_id'        => $this->gig->id,
                        'img_thumb_id'  => $thumb_id,
                        'img_medium_id' => $medium_id,
                        'img_large_id'  => $large_id
                    ]);
    
                }

            }

            // Check if request has new documents
            if (settings('publish')->is_documents_enabled && is_array($this->documents) && count($this->documents)) {
            
                // Delete old documents
                foreach ($this->gig->documents as $doc) {
                    
                    // Get document path
                    $path     = public_path('storage/gigs/documents/' . $doc->uid . '.pdf');

                    // Check if file exists
                    if (File::exists($path)) {
                        
                        // Delete file from local storage
                        File::delete($path);

                    }

                    // Delete document
                    $doc->delete();

                }

                // Upload new documents
                foreach ($this->documents as $d) {
                    
                    // Generate document unique id
                    $doc_uid = uid();

                    // Get original name
                    $name    = $d->getClientOriginalName();

                    // Get file size
                    $size    = $d->getSize();

                    // Move document to local storage
                    $d->storeAs('gigs/documents', $doc_uid . '.pdf', 'custom');

                    // Save document in database
                    GigDocument::create([
                        'uid'    => $doc_uid,
                        'gig_id' => $this->gig->id,
                        'name'   => $name,
                        'size'   => $size
                    ]);


                }

            }

            // Success
            return redirect( config('global.dashboard_prefix') . "/gigs" )->with('success', __('messages.t_gig_updated_successfull'));

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
