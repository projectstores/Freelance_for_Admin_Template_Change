<?php

namespace App\Http\Livewire\Main\Includes;

use App\Models\Category;
use App\Models\ChMessage as Message;
use App\Models\ConversationMessage;
use App\Models\Language;
use App\Models\Notification;
use Livewire\Component;
use App\Models\Gig;
use App\Models\User;
use Conner\Tagging\Model\Tag;
use Cookie;
use WireUi\Traits\Actions;

class Header extends Component
{
    use Actions;

    public $new_messages;
    public $notifications;

    public $q;

    public $gigs    = [];
    public $sellers = [];
    public $tags    = [];

    public $default_language_name;
    public $default_language_code;
    public $default_country_code;

    /**
     * Init component
     *
     * @return void
     */     
    public function mount()
    {
        // Clean query
        $this->q = clean($this->q);
        
        // Check if user online
        if (auth()->check()) {
            
            // Count unread messages
            $unread_message      = Message::where('to_id', auth()->id())
                                            ->where('seen', false)
                                            ->count();

            // Set unread messages
            $this->new_messages  = $unread_message;

            // Get notifications
            $this->notifications = Notification::where('user_id', auth()->id())->where('is_seen', false)->latest()->get();

        }

        // Get language from session
        $locale   = session()->has('locale') ? session()->get('locale') : settings('general')->default_language;

        // Get default language
        $language = Language::where('language_code', $locale)->first();

        // Check if language exists
        if ($language) {
            
            // Set default language
            $this->default_language_name = $language->name;
            $this->default_language_code = $language->language_code;
            $this->default_country_code  = $language->country_code;

        } else {

            // Not found, set default
            $this->default_language_name = "English";
            $this->default_language_code = "en";
            $this->default_country_code  = "us";

        }

    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.includes.header', [
            'categories' => $this->categories,
            'languages'  => $this->languages,
        ]);
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
            $this->reset(['q', 'gigs', 'sellers', 'tags']);

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


    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::with(['subcategories' => function($query) {
            return $query->orderBy('id', 'desc');
        }])->get();
    }


    /**
     * Get supported languages
     *
     * @return object
     */
    public function getLanguagesProperty()
    {
        return Language::orderBy('name', 'asc')->get();
    }


    /**
     * Mark notification as read
     *
     * @param string $id
     * @return void
     */
    public function readNotification($id)
    {
        // Get notification
        Notification::where('uid', $id)->where('user_id', auth()->id())->update([
            'is_seen' => true
        ]);

        // Refresh notifications
        $this->notifications = Notification::where('user_id', auth()->id())->where('is_seen', false)->latest()->get();
    }


    /**
     * Close announce
     *
     * @return void
     */
    public function closeAnnounce()
    {
        // Set cookie
        Cookie::queue('header_announce_closed', true, 4320);
    }


    /**
     * Change locale
     *
     * @param string $locale
     * @return void
     */
    public function setLocale($locale)
    {
        // Get language
        $language = Language::where('language_code', $locale)->where('is_active', true)->first();

        // Check if language exists
        if (!$language) {
            
            // Not found
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_selected_lang_does_not_found'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Set default language
        session()->put('locale', $language->language_code);

        // Refresh the page
        $this->dispatchBrowserEvent('refresh');
    }
    
}
