<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomOffer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'freelancer_id',
        'buyer_id',
        'message',
        'budget_amount',
        'budget_buyer_fee',
        'budget_freelancer_fee',
        'delivery_time',
        'freelancer_status',
        'admin_status',
        'freelancer_rejection_reason',
        'admin_rejection_reason',
        'payment_status',
        'expires_at',
        'delivered_at',
        'canceled_at'
    ];

    /**
     * Get freelancer
     *
     * @return object
     */
    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    /**
     * Get buyer
     *
     * @return object
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }


    /**
     * Get offer attachments
     *
     * @return object
     */
    public function attachments()
    {
        return $this->hasMany(CustomOfferAttachment::class, 'offer_id');
    }


    /**
     * Get offer delivered work
     *
     * @return object
     */
    public function work()
    {
        return $this->hasMany(CustomOfferWork::class, 'offer_id');
    }


    /**
     * Check if offer expired
     *
     * @return boolean
     */
    public function isExpired()
    {
        try {
            
            // Get date when this offer created
            $expires_at = Carbon::parse($this->expires_at, config('app.timezone'));

            // Check if past
            if ($expires_at->isPast()) {
                return true;
            }

            // Not expired yet
            return false;

        } catch (\Throwable $th) {
            
            // Something went wrong
            return false;

        }
    }


    /**
     * Check if work delivered
     *
     * @return boolean
     */
    public function isDelivered()
    {
        try {
            
            // Check if order delivered
            if ($this->freelancer_status === 'completed' && $this->delivered_at && $this->payment_status === 'released') {
                return true;
            }

            // Not delivered yet
            return false;

        } catch (\Throwable $th) {
            
            // Something went wrong
            return false;

        }
    }
}
