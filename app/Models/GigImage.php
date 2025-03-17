<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigImage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gig_images';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gig_id',
        'img_thumb_id',
        'img_medium_id',
        'img_large_id'
    ];


    /**
     * Get small image
     *
     * @return object
     */
    public function small()
    {
        return $this->belongsTo(FileManager::class, 'img_thumb_id');
    }


    /**
     * Get medium image
     *
     * @return object
     */
    public function medium()
    {
        return $this->belongsTo(FileManager::class, 'img_medium_id');
    }


    /**
     * Get large image
     *
     * @return object
     */
    public function large()
    {
        return $this->belongsTo(FileManager::class, 'img_large_id');
    }
}
