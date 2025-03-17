<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOfferAttachment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_offer_attachments';

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
        'uid',
        'offer_id',
        'file_original_name',
        'file_size',
        'file_extension',
        'file_mime'
    ];


    /**
     * Get the offer
     *
     * @return object
     */
    public function offer()
    {
        return $this->belongsTo(CustomOffer::class, 'offer_id');
    }
}
