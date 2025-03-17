<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sitemap\Contracts\Sitemapable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sitemap\Tags\Url;

class Gig extends Model implements Sitemapable
{
    use HasFactory, SoftDeletes, \Conner\Tagging\Taggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gigs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'delivery_time',
        'category_id',
        'subcategory_id',
        'image_thumb_id',
        'image_medium_id',
        'image_large_id',
        'status',
        'rejection_reason',
        'counter_visits',
        'counter_impressions',
        'counter_sales',
        'counter_reviews',
        'rating',
        'orders_in_queue',
        'has_upgrades',
        'has_faqs',
        'video_link',
        'video_id'
    ];


    /**
     * Get sitemap
     *
     * @return mixed
     */
    public function toSitemapTag(): Url | string | array
    {
        return route('service', $this->slug);
    }


    /**
     * Scope a query to only include 
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['active', 'boosted', 'trending', 'featured']);
    }
    
    /**
     * Get avater
     *
     * @return object
     */
    public function avatar()
    {
        return $this->avatar(FileManager::class, 'id');
    }


    /**
     * Get gig owner
     *
     * @return object
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed()->with('avatar');
    }
    
    /**
     * Get gig user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed()->with('avatar');
    }



    /**
     * Get gig category
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    /**
     * Get gig subcategory
     *
     * @return object
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }


    /**
     * Get gig thumbnail image
     *
     * @return object
     */
    public function thumbnail()
    {
        return $this->belongsTo(FileManager::class, 'image_thumb_id');
    }


    /**
     * Get medium image
     *
     * @return object
     */
    public function imageMedium()
    {
        return $this->belongsTo(FileManager::class, 'image_medium_id');
    }


    /**
     * Get large image
     *
     * @return object
     */
    public function imageLarge()
    {
        return $this->belongsTo(FileManager::class, 'image_large_id');
    }


    /**
     * Get gig images
     *
     * @return object
     */
    public function images()
    {
        return $this->hasMany(GigImage::class, 'gig_id');
    }


    /**
     * Get gig documents
     *
     * @return object
     */
    public function documents()
    {
        return $this->hasMany(GigDocument::class, 'gig_id');
    }


    /**
     * Get gig upgrades
     *
     * @return object
     */
    public function upgrades()
    {
        return $this->hasMany(GigUpgrade::class, 'gig_id');
    }


    /**
     * Get gig faqs
     *
     * @return object
     */
    public function faqs()
    {
        return $this->hasMany(GigFaq::class, 'gig_id');
    }


    /**
     * Get gig requirements
     *
     * @return object
     */
    public function requirements()
    {
        return $this->hasMany(GigRequirement::class, 'gig_id');
    }


    /**
     * Get gig seo
     *
     * @return object
     */
    public function seo()
    {
        return $this->hasOne(GigSeo::class, 'gig_id');
    }


    /**
     * Get gig visits
     *
     * @return object
     */
    public function visits()
    {
        return $this->hasMany(GigVisit::class, 'gig_id');
    }

    /**
     * Get gig reviews
     *
     * @return object
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'gig_id');
    }

    /**
     * Get orders for this gig
     *
     * @return object
     */
    public function orders()
    {
        return $this->hasMany(OrderItem::class, 'gig_id');
    }

    /**
     * Calculate orders in queue
     *
     * @return int
     */
    public function total_orders_in_queue()
    {
        try {
            
            // Calculate total orders in queue
            return $this->orders()->where('status', 'proceeded')->count();

        } catch (\Throwable $th) {
            
            // Something went wrong
            return $this->orders_in_queue;

        }
    }

}