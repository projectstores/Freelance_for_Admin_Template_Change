<?php

namespace App\Http\Livewire\Main\Includes;

use Cookie;
use App\Models\Page;
use App\Models\Category;
use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;

class Footer extends Component
{
    use Actions;
    
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
        return view('livewire.main.includes.footer', [
            'pages' => $this->pages,
            'categories' => $this->categories,
        ]);
    }


    /**
     * Get pages
     *
     * @return object
     */
    public function getPagesProperty()
    {
        return Page::orderBy('title', 'asc')->get();
    }
    
     /**
     * Get categories in home page
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::where('is_visible', true)->take(7)->inRandomOrder()->get();
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


    /**
     * Switch theme
     *
     * @return void
     */
    public function switchTheme()
    {
        try {
            
            // Get appearance settings
            $settings = settings('appearance');

            // Check if theme switcher enabled
            if ($settings->is_theme_switcher) {
                
                // Get current theme
                $current = current_theme();

                // Check current theme
                if ($current === 'light') {
                   
                    // Switch to dark mode
                    Cookie::queue('default_theme', 'dark', 10080); // 7 days = 10080 min

                } else {

                    // Switch to light mode
                    Cookie::queue('default_theme', 'light', 10080); // 7 days = 10080 min

                }

                // Refresh the page
                $this->dispatchBrowserEvent('refresh');

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            return;

        }
    }
    
}
