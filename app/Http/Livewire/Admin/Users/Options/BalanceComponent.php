<?php

namespace App\Http\Livewire\Admin\Users\Options;

use App\Models\User;
use App\Models\Level;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Hash;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Users\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BalanceComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $balance_net;
    public $balance_withdrawn;
    public $balance_purchases;
    public $balance_pending;
    public $balance_available;
    public $user;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get user
        $user = User::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'balance_net'       => $user->balance_net,
            'balance_withdrawn' => $user->balance_withdrawn,
            'balance_purchases' => $user->balance_purchases,
            'balance_pending'   => $user->balance_pending,
            'balance_available' => $user->balance_available
        ]);

        // Set user
        $this->user = $user;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_user_balance'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.options.balance')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Edit user
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Get level
            $level = Level::where('id', $this->level)->firstOrFail();

            // This level must be same as account type
            if ($level->account_type !== $this->account_type) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_selected_level_not_valid_for_account_type'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Check if request has avatar image
            if ($this->avatar) {
                $avatar_id = ImageUploader::make($this->avatar)
                                            ->deleteById($this->user->avatar_id)
                                            ->resize(100)
                                            ->folder('avatars')
                                            ->handle();
            } else {
                $avatar_id = $this->user->avatar_id;
            }

            // Update user
            User::where('id', $this->user->id)->update([
                'username'          => $this->username,
                'email'             => $this->email,
                'password'          => $this->password ? Hash::make($this->password) : $this->user->password,
                'account_type'      => $this->account_type,
                'level_id'          => $this->level,
                'country_id'        => $this->country,
                'fullname'          => $this->fullname,
                'headline'          => $this->headline,
                'description'       => $this->description,
                'status'            => $this->status,
                'avatar_id'         => $avatar_id
            ]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_account_has_been_created'),
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
    
}
