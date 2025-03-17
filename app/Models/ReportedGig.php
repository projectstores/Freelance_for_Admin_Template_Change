<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedGig extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reported_gigs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gig_id', 'user_id', 'status', 'reason'];

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * Get gig
     *
     * @return object
     */
    public function gig()
    {
        return $this->belongsTo(Gig::class, 'gig_id')->withTrashed();
    }

    /**
     * Get reporter
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
