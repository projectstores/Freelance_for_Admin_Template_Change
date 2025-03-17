<?php

namespace App\Http\Livewire\Main\Categories;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Gig;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SubcategoryComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    public $category;
    public $subcategory;

    // filters
    public $sort_by;
    public $min_price;
    public $max_price;
    public $delivery_time;
    public $rating;

    public $delivery_times;
    public $q;
    protected $queryString = ['min_price', 'max_price', 'delivery_time', 'rating', 'sort_by'];

    /**
     * Init component
     *
     * @param string $parent
     * @return void
     */
    public function mount($parent, $subcategory)
    {
        // Get category
        $category          = Category::where('slug', $parent)->firstOrFail();

        // Get subcategory
        $subcategory       = Subcategory::where('slug', $subcategory)->where('parent_id', $category->id)->firstOrFail();

        // Set subcategory
        $this->subcategory = $subcategory;

        // Set category
        $this->category    = $category;

        // Set delivery times
        $this->delivery_times = [
            ['value' => 1, 'text' => __('messages.t_1_day')],
            ['value' => 2, 'text' => __('messages.t_2_days')],
            ['value' => 3, 'text' => __('messages.t_3_days')],
            ['value' => 4, 'text' => __('messages.t_4_days')],
            ['value' => 5, 'text' => __('messages.t_5_days')],
            ['value' => 6, 'text' => __('messages.t_6_days')],
            ['value' => 7, 'text' => __('messages.t_1_week')],
            ['value' => 14, 'text' => __('messages.t_2_weeks')],
            ['value' => 21, 'text' => __('messages.t_3_weeks')],
            ['value' => 30, 'text' => __('messages.t_1_month')]
        ];
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
        $title       = $this->subcategory->name . " $separator " . settings('general')->title;
        $description = $this->subcategory->description;
        $ogimage     = src( $this->subcategory->image );

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

        return view('livewire.main.categories.subcategory', [
            'gigs' => $this->gigs
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get gigs
     *
     * @return void
     */
    public function getGigsProperty()
    {
        // start a new query
        $query = Gig::query()->where('subcategory_id', $this->subcategory->id)->active();

        // Check price
        if ($this->min_price) {
            $query->whereBetween('price', [$this->min_price, 999999]);
        }

        // Set max price
        if ($this->max_price) {
            $query->whereBetween('price', [0, $this->max_price]);
        }

        // Check delivery time
        if ($this->delivery_time) {
            $query->where('delivery_time', $this->delivery_time);
        }

        // Check rating
        if ($this->rating) {
            $query->whereBetween('rating', [$this->rating, $this->rating +1]);
        }

        // Check sort by
        if ($this->sort_by) {
            switch ($this->sort_by) {

                // Most popular
                case 'popular':
                    $query->orderByDesc('counter_visits');
                    break;

                // Best rating
                case 'rating':
                    $query->orderByDesc('rating');
                    break;

                // Most sales
                case 'sales':
                    $query->orderByDesc('counter_sales');
                    break;

                // Newest
                case 'newest':
                    $query->orderByDesc('id');
                    break;

                // Price low to high
                case 'price_low_high':
                    $query->orderBy('price', 'ASC');
                    break;

                // Price high to low
                case 'price_high_low':
                    $query->orderBy('price', 'DESC');
                    break;
                
                default:
                    $query->orderByRaw('RAND()');
                    break;
            }
        }

        // Set results
        return $query->paginate(42);
    }


    /**
     * Filter data
     *
     * @return mixed
     */
    public function filter()
    {
        // Set empty array
        $queries = [];

        // Check if rating
        if ($this->rating && in_array($this->rating, [1,2,3,4,5])) {
            $queries['rating'] = $this->rating;
        }

        // Check if has min price
        if ($this->min_price) {
            $queries['min_price'] = $this->min_price;
        }

        // Check if has max price
        if ($this->max_price) {
            $queries['max_price'] = $this->max_price;
        }

        // Check if has delivery time
        if ($this->delivery_time) {
            $queries['delivery_time'] = $this->delivery_time;
        }

        // Change this to query string
        $string = Arr::query($queries);

        // Generate url
        $url    = url("categories/". $this->category->slug . "/" . $this->subcategory->slug . "?" . $string);
        
        return redirect($url);
    }


    /**
     * Reset filter
     *
     * @return void
     */
    public function resetFilter()
    {
        // Reset filter
        return redirect('categories/' . $this->category->slug . "/" . $this->subcategory->slug);
    }

}