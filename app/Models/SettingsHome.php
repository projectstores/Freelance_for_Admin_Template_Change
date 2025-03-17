<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsHome extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_home';

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
        'show_popular_services',
        'show_made_with',
        'show_join_us_banner',
        'show_benefits',
        'show_home_video',
        'show_gigs',
        'youtube_video_id',
        'join_us_image_id',
        'benefits_1_logo',
        'benefits_2_logo',
        'benefits_3_logo',
        'benefits_4_logo',
        'made_with_images_id',
    ];

    /**
     * Get large background image
     *
     * @return object
     */
    public function join_us_image()
    {
        return $this->belongsTo(FileManager::class, 'join_us_image_id');
    }
    
    /**
     * Get 'made with' images
     *
     * @return object
     */
    public function made_with_images()
    {
        return $this->hasMany(FileManager::class, 'uid');
    }
    
    /**
     * Get benefits logo 1
     *
     * @return object
     */
    public function benefits_logo_1()
    {
        return $this->belongsTo(FileManager::class, 'benefits_1_logo');
    }
    
    /**
     * Get benefits logo 2
     *
     * @return object
     */
    public function benefits_logo_2()
    {
        return $this->belongsTo(FileManager::class, 'benefits_2_logo');
    }
    
    /**
     * Get benefits logo 3
     *
     * @return object
     */
    public function benefits_logo_3()
    {
        return $this->belongsTo(FileManager::class, 'benefits_3_logo');
    }
    
    /**
     * Get benefits logo 4
     *
     * @return object
     */
    public function benefits_logo_4()
    {
        return $this->belongsTo(FileManager::class, 'benefits_4_logo');
    }
}
