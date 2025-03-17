<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategoryTranslation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects_categories_translation';

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
        'language_code',
        'language_value',
        'projects_category_id'
    ];

    /**
     * Get translation category
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
