<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundConversation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'refund_conversation';

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
        'refund_id',
        'author_type',
        'author_id',
        'message'
    ];

    /**
     * Get seller
     *
     * @return object
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'author_id')->withTrashed();
    }

    /**
     * Get buyer
     *
     * @return object
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'author_id')->withTrashed();
    }
}
