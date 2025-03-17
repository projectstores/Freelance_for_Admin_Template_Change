<?php

namespace App\Http\Livewire\Main\Seller\Gigs\Options\Steps;

use App\Models\Gig;
use App\Models\Admin;
use App\Models\GigFaq;
use App\Models\GigSeo;
use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Notifications\Admin\PendingGig;
use App\Http\Validators\Main\Seller\Gigs\Edit\OverviewValidator;

class Overview extends Component
{
    use Actions;
    
    public $title;
    public $category;
    public $subcategory;
    public $description;
    public $seo_title;
    public $seo_description;
    public $question;
    public $answer;
    public $tags          = [];
    public $faqs          = [];

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

        // Set tags
        if ($gig->tags) {
            foreach ($gig->tags as $tag) {
                array_push($this->tags, $tag->name);
            }
        }

        // Set faqs
        if ($gig->faqs) {
            foreach ($gig->faqs as $faq) {
                // Set faq
                $faq = [
                    'question' => $faq->question,
                    'answer'   => $faq->answer
                ];

                // Add this faq to list
                array_push($this->faqs, $faq);
            }
        }

        // Fill form
        $this->fill([
            'title'           => $gig->title,
            'category'        => $gig->category_id,
            'subcategory'     => $gig->subcategory_id,
            'description'     => $gig->description,
            'seo_title'       => $gig->seo ? $gig->seo->title : null,
            'seo_description' => $gig->seo ? $gig->seo->description : null,
        ]);
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.seller.gigs.options.steps.overview', [
            'categories'    => $this->categories,
            'subcategories' => $this->subcategories,
        ]);
    }


    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }


    /**
     * Get subcategories
     *
     * @return object
     */
    public function getSubcategoriesProperty()
    {
        return Subcategory::where('parent_id', $this->gig->category_id)->orderBy('name')->get();
    }


    /**
     * Get subcategories
     *
     * @param integer $id
     * @return void
     */
    public function updatedCategory($id)
    {
        // Get all subcategories in this parent category
        $this->subcategories = Subcategory::where('parent_id', $id)->orderBy('name')->get();
    }


    /**
     * Add a FAQ to list
     *
     * @return void
     */
    public function addFaq()
    {
        // Validate form
        try {

            // Validate form
            OverviewValidator::faq($this);

            // Set faq
            $faq = [
                'question' => $this->question,
                'answer'   => $this->answer
            ];

            // Add this faq to list
            array_push($this->faqs, $faq);

            // Reset form
            $this->reset(['answer', 'question']);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_faq_added_successfully'),
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

    /**
     * Remove item from list
     *
     * @param integer $key
     * @return void
     */
    public function removeFaq($key)
    {
        // Check if item set in array
        if (isset($this->faqs[$key])) {
            
            // Remove it
            unset($this->faqs[$key]);

        }
    }


    /**
     * Add tag to list
     *
     * @param string $tag
     * @return void
     */
    public function addTag(string $tag)
    {
        // Validate form
        try {

            // Validate form
            OverviewValidator::tag($tag);

            // Clear tag
            $clean = str_replace(['"', "'", ";", ":", "/", ",", ".", "-", "_", "&", "!"], "", $tag);

            // Add add tag to list
            array_push($this->tags, $clean);

            // Refresh tags list
            array_values($this->tags);

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
     * Remove tag from list
     *
     * @param string $tag
     * @return void
     */
    public function removeTag($tag)
    {
        // Get tag key
        $key = array_search($tag, $this->tags);

        // Check if tag exists
        if (isset($this->tags[$key])) {
            
            // Delete this tag
            unset($this->tags[$key]);

            // Refresh tags list
            array_values($this->tags);

        }
    }


    /**
     * Save overview data section
     *
     * @return void
     */
    public function save()
    {
        try {
            
            // Validate form
            OverviewValidator::all($this);

            // Check if request has tags
            if (count($this->tags)) {
                
                // Delete old tags
                $this->gig->untag();

                // Add new tags
                foreach ($this->tags as $tag) {
                    $this->gig->tag($tag);
                }

            }

            // Check if request has new faqs
            if (count($this->faqs)) {
                
                // Delete old faqs
                GigFaq::where('gig_id', $this->gig->id)->delete();

                // Add new faqs
                foreach ($this->faqs as $faq) {
                    
                    // Save faq
                    GigFaq::create([
                        'gig_id'   => $this->gig->id,
                        'question' => clean($faq['question']),
                        'answer'   => clean($faq['answer'])
                    ]);

                }

            }

            // Check if request has seo details
            if ($this->seo_title && $this->seo_description) {
                
                // Delete old seo
                GigSeo::where('gig_id', $this->gig->id)->delete();

                // Add new seo
                GigSeo::create([
                    'gig_id'      => $this->gig->id,
                    'title'       => clean($this->seo_title),
                    'description' => clean($this->seo_description),
                ]);

            }

            // Get title
            $title                     = htmlspecialchars_decode(clean($this->title));

            // Generate unique slug for this gig
            $slug                      = substr( Str::slug($title), 0, 138 ) . '-' . $this->gig->uid;

            // Get description
            $description               = clean($this->description);

            // Get gig status
            $status                    = settings('publish')->auto_approve_gigs ? 'active' : 'pending';

            // Update gig data
            $this->gig->title          = $title;
            $this->gig->slug           = $slug;
            $this->gig->status         = $status;
            $this->gig->description    = $description;
            $this->gig->category_id    = $this->category;
            $this->gig->subcategory_id = $this->subcategory;
            $this->gig->save();

            // Send notification to admin
            if ($status === 'pending') {
                Admin::first()->notify(new PendingGig($this->gig));
            }

            // Success
            return redirect('seller/gigs/edit/' . $this->gig->uid . '?step=pricing')->with('success', __('messages.t_overview_section_has_been_saved'));

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
