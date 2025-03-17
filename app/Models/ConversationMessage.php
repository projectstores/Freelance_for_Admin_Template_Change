<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conversation_messages';

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
        'conversation_id',
        'message_from',
        'message_to',
        'message',
        'is_seen'
    ];

    /**
     * Get message sender
     *
     * @return object
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'message_from')->withTrashed();
    }
}
