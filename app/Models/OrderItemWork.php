<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemWork extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_work';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'order_item_id',
        'attached_work',
        'quick_response'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'attached_work' => 'array',
    ];

    /**
     * Get order item
     *
     * @return object
     */
    public function item()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }
}
