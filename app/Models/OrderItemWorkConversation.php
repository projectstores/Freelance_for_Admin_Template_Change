<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemWorkConversation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_item_work_conversation';

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
        'item_id',
        'seller_id',
        'buyer_id',
        'msg_from',
        'msg_content',
        'is_seen'
    ];

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
     * Get message from
     *
     * @return object
     */
    public function from()
    {
        return $this->belongsTo(User::class, 'msg_from')->withTrashed();
    }
}
