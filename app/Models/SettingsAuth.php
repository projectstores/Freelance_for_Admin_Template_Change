<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsAuth extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_auth';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'verification_required',
        'verification_type',
        'verification_expiry_period',
        'password_reset_expiry_period',
        'auth_img_id',
        'is_facebook_login',
        'is_google_login',
        'is_twitter_login',
        'is_github_login',
        'is_linkedin_login'
    ];

    /**
     * Get wallpaper for authentication screen 
     *
     * @return object
     */
    public function wallpaper()
    {
        return $this->belongsTo(FileManager::class, 'auth_img_id');
    }
}
