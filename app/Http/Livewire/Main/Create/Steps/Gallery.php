<?php

namespace App\Http\Livewire\Main\Create\Steps;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Http\Validators\Main\Create\GalleryValidator;

class Gallery extends Component
{
    use WithFileUploads, Actions;

    public $images    = [];
    public $documents = [];
    public $video_link;
    public $video_id;
    public $thumbnail;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps.gallery');
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
        $this->emit('back');
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

            // Set images 
            foreach ($this->images as $key => $image) {
                $data['images'][$key] = $image->getFilename();
            }

            // Set documents 
            if (settings('publish')->is_documents_enabled && count($this->documents)) {
                foreach ($this->documents as $key => $document) {
                    $data['documents'][$key] = $document->getFilename();
                }
            }

            // Set data
            $data['thumbnail']  = $this->thumbnail->getFilename();
            $data['video_link'] = $this->video_link ? $this->video_link : null;
            $data['video_id']   = $this->video_link ? youtubeId($this->video_link) : null;

            // Send this data to parent component
            $this->emit('data-saved-gallery', $data);

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
