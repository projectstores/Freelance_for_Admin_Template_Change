<?php

namespace App\Http\Livewire\Main\Cards;

use Livewire\Component;
use App\Models\Favorite;
use WireUi\Traits\Actions;
use App\Models\Gig as ModelsGig;

class Gig extends Component
{
    use Actions;
    
    public $gig;
    public $favorite = false;
    public $profile_visible;

    /**
     * Init component
     *
     * @param object $gig
     * @return void
     */
    public function mount($gig, $profile_visible = true)
    {
        // Get gig
        $this->gig = $gig;

        // Check if user authenticated
        if (auth()->check()) {
            
            $this->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $gig->id)->first() ? true : false;

        }

        // Set profile visibility
        $this->profile_visible = $profile_visible;

    }

    /**
     * Render component
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.main.cards.gig');
    }

    
    /**
     * Remove gig from favorite
     *
     * @param string $id
     * @return void
     */
    public function removeFromFavorite($id)
    {
        try {
        
            // Get gig
            $gig      = ModelsGig::where('uid', $id)->where('user_id', '!=', auth()->id())->active()->firstOrFail();

            // Check if gig already in favorite
            $favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $gig->id)->first();

            // Check if already exists
            if ($favorite) {
                
                // Delete
                $favorite->delete();

                // Update status
                $this->favorite = false;

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_gig_removed_from_ur_favorite_list'),
                    'icon'        => 'success'
                ]);

            }

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Add gig to favorite list
     *
     * @param string $id
     * @return mixed
     */
    public function addToFavorite($id)
    {
        try {
            
            // User must login first
            if (auth()->guest()) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_pls_login_or_register_to_add_to_favovorite'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get gig
            $gig        = ModelsGig::where('uid', $id)->where('user_id', '!=', auth()->id())->active()->firstOrFail();

            // Check if gig already in favorite
            $in_favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $gig->id)->first();

            // Check if already exists
            if ($in_favorite) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_this_gig_already_in_favorite_list'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Add to list
            Favorite::create([
                'gig_id'  => $gig->id,
                'user_id' => auth()->id()
            ]);

            // Set status
            $this->favorite = true;

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_gig_has_been_added_to_favorite_list'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }
}
