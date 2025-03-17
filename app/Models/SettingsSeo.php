<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsSeo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_seo';

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
        'description',
        'facebook_page_id',
        'facebook_app_id',
        'twitter_username',
        'ogimage_id',
        'is_sitemap'
    ];


    /**
     * Get ogimage
     *
     * @return object
     */
    public function ogimage()
    {
        return $this->belongsTo(FileManager::class, 'ogimage_id');
    }
}
