<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsHero extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_hero';

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
        'enable_bg_img',
        'bg_large_id',
        'bg_medium_id',
        'bg_small_id',
        'bg_color',
        'bg_large_height',
        'bg_small_height',
        'tagline'
    ];

    /**
     * Get large background image
     *
     * @return object
     */
    public function background_large()
    {
        return $this->belongsTo(FileManager::class, 'bg_large_id');
    }

    /**
     * Get medium background image
     *
     * @return object
     */
    public function background_medium()
    {
        return $this->belongsTo(FileManager::class, 'bg_medium_id');
    }

    /**
     * Get small background image
     *
     * @return object
     */
    public function background_small()
    {
        return $this->belongsTo(FileManager::class, 'bg_small_id');
    }
}
