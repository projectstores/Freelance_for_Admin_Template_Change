<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conversations';

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
        'from_id',
        'to_id',
        'status',
        'blocked_by',
        'last_message_at'
    ];

    /**
     * Get user 1
     *
     * @return object
     */
    public function from()
    {
        return $this->belongsTo(User::class, 'from_id')->withTrashed();
    }

    /**
     * Get user 2
     *
     * @return object
     */
    public function to()
    {
        return $this->belongsTo(User::class, 'to_id')->withTrashed();
    }

    /**
     * Get user who blocked this conversation
     *
     * @return object
     */
    public function blocker()
    {
        return $this->belongsTo(User::class, 'blocked_by')->withTrashed();
    }

    /**
     * Get conversation messages
     *
     * @return object
     */
    public function messages()
    {
        return $this->hasMany(ConversationMessage::class, 'conversation_id');
    }

    /**
     * Get sender  
     *
     * @return object
     */
    public function sender()
    {
        if ((int)auth()->id() === (int)$this->from_id) {
            return $this->belongsTo(User::class, 'to_id')->withTrashed();
        } else {
            return $this->belongsTo(User::class, 'from_id')->withTrashed();
        }
    }

    /**
     * Count unread messages
     *
     * @return integer
     */
    public function unreadMessages()
    {
        return $this->hasMany(ConversationMessage::class, 'conversation_id')
                    ->where('message_from', '!=', auth()->id())
                    ->where('is_seen', false);
    }
}
