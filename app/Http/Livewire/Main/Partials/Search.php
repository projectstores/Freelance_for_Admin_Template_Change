<?php

namespace App\Http\Livewire\Main\Partials;

use App\Models\Gig;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Conner\Tagging\Model\Tag;

class Search extends Component
{
    use Actions;
    
    public $q;

    public $gigs    = [];
    public $sellers = [];
    public $tags    = [];

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Clean query
        $this->q = clean($this->q);
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.partials.search');
    }


    /**
     * Listen when q keyword changes
     *
     * @return void
     */
    public function updatedQ()
    {
        // Search
        $this->search();
    }


    /**
     * Search by query
     *
     * @return mixed
     */
    public function search()
    {
        
        // Check if has a searching keyword
        if ($this->q) {
            
            // Set keyword
            $keyword       = $this->q;

            // Get gigs same as this keyword
            $gigs          = Gig::query()
                                        ->active()
                                        ->where(function($query) use($keyword) {
                                            return $query->where('title', 'LIKE', "%{$keyword}%") 
                                                        ->orWhere('slug', 'LIKE', "%{$keyword}%") 
                                                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                                        })  
                                        ->select('id', 'title', 'slug')
                                        ->limit(10)
                                        ->get();

            // Set gigs
            $this->gigs    = $gigs;

            // Get sellers
            $sellers       = User::query()
                                        ->whereIn('status', ['verified', 'active'])
                                        ->where('account_type', 'seller')
                                        ->where(function($query) use($keyword) {
                                            return $query->where('username', 'LIKE', "%{$keyword}%")
                                                        ->orWhere('fullname', 'LIKE', "%{$keyword}%")
                                                        ->orWhere('headline', 'LIKE', "%{$keyword}%")
                                                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                                        })
                                        ->select('id', 'username', 'avatar_id', 'status', 'headline', 'fullname', 'description', 'account_type')
                                        ->with('avatar')
                                        ->limit(10)
                                        ->get();

            // Set sellers
            $this->sellers = $sellers;

            // Get tags
            $tags          = Tag::query()
                                        ->where('name', 'LIKE', "%{$keyword}%")
                                        ->select('slug', 'name')
                                        ->limit(10)
                                        ->get();
            
            // Set tags
            $this->tags    = $tags;

        } else {
            
            // Reset data
            $this->reset();

        }

    }


    /**
     * Go to search page
     *
     * @return void
     */
    public function enter()
    {
        // Check if has a search term
        if (!$this->q) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_info'),
                'description' => __('messages.t_pls_type_a_search_term_first'),
                'icon'        => 'info'
            ]);

            return;

        }

        // Redirect to search page
        return redirect('search?q=' . $this->q);
    }
    
}
