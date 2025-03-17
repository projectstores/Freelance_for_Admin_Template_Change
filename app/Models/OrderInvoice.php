<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_invoice';

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
        'order_id',
        'payment_method',
        'payment_id',
        'firstname',
        'lastname',
        'email',
        'company',
        'address',
    ];


    /**
     * Get invoice order
     *
     * @return object
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
