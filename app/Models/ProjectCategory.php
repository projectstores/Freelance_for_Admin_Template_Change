<?php

namespace App\Models;

use Spatie\Sitemap\Tags\Url;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategory extends Model implements Sitemapable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'name',
        'slug',
        'seo_description'
    ];

    /**
     * Get sitemap
     *
     * @return mixed
     */
    public function toSitemapTag(): Url | string | array
    {
        return url('explore/projects', $this->slug);
    }

    /**
     * Get category translation
     *
     * @return object
     */
    public function translation()
    {
        return $this->hasMany(ProjectCategoryTranslation::class, 'projects_category_id');
    }

    /**
     * Get projects in this category
     *
     * @return object
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    /**
     * Get thumbnail
     *
     * @return object
     */
    public function thumbnail()
    {
        return $this->belongsTo(FileManager::class, 'thumbnail_id');
    }

    /**
     * Get ogimage
     *
     * @return object
     */
    public function ogimage()
    {
        return $this->belongsTo(FileManager::class, 'ogimage_id');
    }

    /**
     * Get category skils
     *
     * @return object
     */
    public function skills()
    {
        return $this->hasMany(ProjectSkill::class, 'category_id');
    }
}
