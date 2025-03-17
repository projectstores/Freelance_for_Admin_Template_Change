<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBid extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_bids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'project_id',
        'user_id',
        'amount',
        'days',
        'message',
        'is_sponsored',
        'is_highlight',
        'is_sealed',
        'is_awarded',
        'is_freelancer_accepted',
        'status',
        'awarded_date',
        'freelancer_accepted_date',
        'admin_rejection_reason',
        'freelancer_rejection_reason',
        'freelancer_rejected_date'
    ];

    /**
     * Get project
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Get user who made this bid
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get list of upgrades
     *
     * @return object
     */
    public function upgrades()
    {
        return $this->hasMany(ProjectBidUpgrade::class, 'bid_id');
    }

    /**
     * Get latest payment
     *
     * @return object
     */
    public function checkout()
    {
        return $this->hasOne(ProjectBidUpgrade::class, 'bid_id')->where('status', 'pending')->latest();
    }
}
