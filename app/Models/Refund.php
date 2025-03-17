<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'refunds';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'item_id',
        'seller_id',
        'buyer_id',
        'reason',
        'status',
        'is_seen_by_seller',
        'is_seen_by_admin',
        'request_admin_intervention'
    ];

    /**
     * Get item
     *
     * @return object
     */
    public function item()
    {
        return $this->belongsTo(OrderItem::class, 'item_id');
    }

    /**
     * Get seller
     *
     * @return object
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id')->withTrashed();
    }

    /**
     * Get buyer
     *
     * @return object
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id')->withTrashed();
    }

    /**
     * Get refund conversation
     *
     * @return object
     */
    public function conversation()
    {
        return $this->hasMany(RefundConversation::class, 'refund_id');
    }
}
