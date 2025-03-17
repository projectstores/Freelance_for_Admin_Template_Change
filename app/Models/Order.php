<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'placed_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'buyer_id',
        'total_value',
        'subtotal_value',
        'taxes_value',
        'is_finished',
    ];


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
     * Get order items
     *
     * @return object
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /**
     * Get order invoice
     *
     * @return object
     */
    public function invoice()
    {
        return $this->hasOne(OrderInvoice::class, 'order_id');
    }
}
