<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedUser extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reported_users';

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
        'reporter_id',
        'reported_id',
        'ip_address',
        'reason',
        'is_seen'
    ];

    /**
     * Get reporter user
     *
     * @return object
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id')->withTrashed();
    }

    /**
     * Get reported user
     *
     * @return object
     */
    public function reported()
    {
        return $this->belongsTo(User::class, 'reported_id')->withTrashed();
    }
}
