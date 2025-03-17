<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'placed_at';

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
        'order_id',
        'gig_id',
        'owner_id',
        'quantity',
        'has_upgrades',
        'is_requirements_sent',
        'total_value',
        'profit_value',
        'commission_value',
        'status',
        'is_finished',
        'expected_delivery_date',
        'canceled_by',
        'proceeded_at',
        'delivered_at',
        'canceled_at',
        'refunded_at',
    ];

    /**
     * Get gig item
     *
     * @return object
     */
    public function gig()
    {
        return $this->belongsTo(Gig::class, 'gig_id')->withTrashed();
    }

    /**
     * Get gig owner
     *
     * @return object
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withTrashed();
    }

    /**
     * Get item upgrades list
     *
     * @return object
     */
    public function upgrades()
    {
        return $this->hasMany(OrderItemUpgrade::class, 'item_id');
    }

    /**
     * Get item requirements
     *
     * @return object
     */
    public function requirements()
    {
        return $this->hasMany(OrderItemRequirement::class, 'item_id');
    }

    /**
     * Get order
     *
     * @return object
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Get delivered work
     *
     * @return object
     */
    public function delivered_work()
    {
        return $this->hasOne(OrderItemWork::class, 'order_item_id');
    }

    /**
     * Get delivered work conversation
     *
     * @return object
     */
    public function conversation()
    {
        return $this->hasMany(OrderItemWorkConversation::class, 'item_id');
    }

    /**
     * Get refund
     *
     * @return object
     */
    public function refund()
    {
        return $this->hasOne(Refund::class, 'item_id');
    }
}
