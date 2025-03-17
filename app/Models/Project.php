<?php

namespace App\Models;

use Spatie\Sitemap\Tags\Url;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model implements Sitemapable
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'pid',
        'user_id',
        'title',
        'slug',
        'description',
        'category_id',
        'budget_min',
        'budget_max',
        'budget_type',
        'duration',
        'status',
        'rejection_reason',
        'is_featured',
        'is_urgent',
        'is_highlighted',
        'is_alert',
        'expiry_date_featured',
        'expiry_date_urgent',
        'expiry_date_highlight',
        'counter_views',
        'counter_impressions',
        'counter_bids',
        'expiry_date',
        'awarded_bid_id',
        'awarded_freelancer_id'
    ];

    /**
     * Get sitemap
     *
     * @return mixed
     */
    public function toSitemapTag(): Url | string | array
    {
        return url('project/' . $this->pid . '/' . $this->slug);
    }

    /**
     * Get project skills
     *
     * @return object
     */
    public function skills()
    {
        return $this->hasMany(ProjectRequiredSkill::class, 'project_id');
    }
    
    public function project_skills()
    {
        return $this->hasMany(ProjectRequiredSkill::class, 'project_id')
            ->join('projects_skills', 'projects_skills.id', '=', 'project_required_skills.skill_id')
            ->select('project_required_skills.*', 'projects_skills.name as skill_name');
    }


    /**
     * Get category
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    /**
     * Get project bids
     *
     * @return object
     */
    public function bids()
    {
        return $this->hasMany(ProjectBid::class, 'project_id');
    }

    /**
     * Get project's milestones
     */
    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class, 'project_id');
    }

    /**
     * Get project's client
     *
     * @return object
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Get awarded bid for this project
     *
     * @return object
     */
    public function awarded_bid()
    {
        return $this->belongsTo(ProjectBid::class, 'awarded_bid_id');
    }

    /**
     * Get shared filesa
     *
     * @return object
     */
    public function shared_files()
    {
        return $this->hasMany(ProjectSharedFile::class, 'project_id');
    }

    /**
     * Check if has a milestone payment
     *
     * @return boolean
     */
    public function has_confirmed_milestone()
    {
        return $this->hasOne(ProjectMilestone::class, 'project_id')->whereIn('status', ['paid', 'funded']);
    }

    /**
     * Get subscriptions
     *
     * @return object
     */
    public function subscriptions()
    {
        return $this->hasMany(ProjectSubscription::class, 'project_id');
    }
}