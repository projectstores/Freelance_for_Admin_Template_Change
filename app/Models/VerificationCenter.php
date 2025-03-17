<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCenter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'verification_center';

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
        'user_id',
        'document_type',
        'file_front_side',
        'file_back_side',
        'file_selfie',
        'status',
        'verified_at',
        'declined_at'
    ];

    /**
     * Get verification file front side
     *
     * @return object
     */
    public function frontside()
    {
        return $this->belongsTo(FileManager::class, 'file_front_side');
    }

    /**
     * Get verification file back side
     *
     * @return object
     */
    public function backside()
    {
        return $this->belongsTo(FileManager::class, 'file_back_side');
    }

    /**
     * Get verification file selfie
     *
     * @return object
     */
    public function selfie()
    {
        return $this->belongsTo(FileManager::class, 'file_selfie');
    }


    /**
     * Get user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
