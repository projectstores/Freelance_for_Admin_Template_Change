<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsAppearance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_appearance';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $casts = [
        'colors' => 'array',
        'sizes'  => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'colors',
        'default_theme',
        'is_theme_switcher',
        'sizes',
        'font_link',
        'font_family',
        'is_featured_categories',
        'is_best_sellers',
        'placeholder_img_id',
        'custom_code_head_main_layout',
        'custom_code_footer_main_layout',
        'custom_code_head_admin_layout',
        'custom_code_footer_admin_layout',
        'custom_code_head_freelancer_layout',
        'custom_code_footer_freelancer_layout'
    ];

    /**
     * Get placeholder img
     *
     * @return object
     */
    public function placeholder()
    {
        return $this->belongsTo(FileManager::class, 'placeholder_img_id');
    }

}
