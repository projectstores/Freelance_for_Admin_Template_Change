<?php

namespace App\Http\Livewire\Main\Account\Sessions;

use DB;
use Auth;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SessionsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $password;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_browser_sessions') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.sessions.sessions', [
            'sessions' => $this->sessions
        ])->extends('livewire.main.layout.app2')->section('content');
    }


    /**
     * Get list of all sessions
     *
     * @return object
     */
    public function getSessionsProperty()
    {
        // Set time locale
        Carbon::setLocale(config()->get('backend_timing_locale'));

        return collect(
            DB::table('sessions')
                ->where('user_id', auth()->id())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) {
            return (object) [
                'agent'             => $this->createAgent($session),
                'ip_address'        => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active'       => $session->last_activity ? Carbon::createFromTimestamp($session->last_activity, config('app.timezone'))->diffForHumans() : null
            ];
        });
    }


    /**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }


    /**
     * Loogut other browser sessions
     *
     * @return void
     */
    public function logout()
    {
        try {
            
            // Set current user
            $user = auth()->user();

            // Validate current password
            if ( $user->password && !Hash::check($this->password, $user->password)) {
                
                // Password does not match
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_ur_current_pass_does_not_match'),
                    'icon'        => 'error'
                ]);

                return;

            }
    
            // Logout other devices
            Auth::guard('web')->logoutOtherDevices($this->password, 'password');
    
            // Delete sessions records
            $this->deleteOtherSessionRecords();
    
            request()->session()->put([
                'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
            ]);

            // Reset password field
            $this->reset('password');
    
            // Refresh the page
            $this->dispatchBrowserEvent('refresh');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
        
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Delete the other browser session records from storage.
     *
     * @return void
     */
    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))
            ->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }
    
}