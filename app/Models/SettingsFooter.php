<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsFooter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_footer';

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
        'is_language_switcher',
        'page_terms_id',
        'page_policy_id',
        'logo_id',
        'copyrights',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin',
        'social_pinterest',
        'social_youtube',
        'social_github',
    ];

    /**
     * Get footer logo
     *
     * @return object
     */
    public function logo()
    {
        return $this->belongsTo(FileManager::class, 'logo_id');
    }

    /**
     * Get terms page
     *
     * @return object
     */
    public function terms()
    {
        return $this->belongsTo(Page::class, 'page_terms_id');
    }

    /**
     * Get privacy policy page
     *
     * @return object
     */
    public function privacy()
    {
        return $this->belongsTo(Page::class, 'page_policy_id');
    }
}
