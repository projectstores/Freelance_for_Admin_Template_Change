<?php

namespace App\Http\Livewire\Admin\Users\Options;

use App\Models\User;
use App\Models\Level;
use App\Models\Country;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Users\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $username;
    public $email;
    public $password;
    public $account_type;
    public $level;
    public $country;
    public $fullname;
    public $headline;
    public $description;
    public $avatar;
    public $status;
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
            'username'     => $user->username,
            'email'        => $user->email,
            'account_type' => $user->account_type,
            'level'        => $user->level_id,
            'country'      => $user->country_id,
            'fullname'     => $user->fullname,
            'headline'     => $user->headline,
            'description'  => $user->description,
            'status'       => $user->status,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_user'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.options.edit', [
            'countries' => $this->countries,
            'levels'    => $this->levels,
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get countries
     *
     * @return object
     */
    public function getCountriesProperty()
    {
        return Country::where('is_active', true)->orderBy('name', 'asc')->get();
    }


    /**
     * Get levels
     *
     * @return object
     */
    public function getLevelsProperty()
    {
        return Level::orderBy('title', 'asc')->get();
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
                'description' => __('messages.t_toast_operation_success'),
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
