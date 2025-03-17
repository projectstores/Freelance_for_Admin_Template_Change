<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectBidUpgrade extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_bid_upgrades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bid_id',
        'uid',
        'payment_method',
        'payment_id',
        'amount',
        'status',
        'rejection_reason',
        'receipt_id'
    ];

    /**
     * Get bid
     *
     * @return object
     */
    public function bid()
    {
        return $this->belongsTo(ProjectBid::class, 'bid_id');
    }
}
