<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    /**
     * Get message from
     *
     * @return object
     */
    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }


    /**
     * Get message to
     *
     * @return object
     */
    public function to()
    {
        return $this->belongsTo(User::class, 'to_id');
    }

    /**
     * Get avatar
     *
     * @return object
     */
    public function avatar()
    {
        return $this->belongsTo(FileManager::class, 'avatar_id');
    }
}
