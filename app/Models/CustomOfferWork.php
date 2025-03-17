<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOfferWork extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_offer_work';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'offer_id',
        'notes',
        'file_extension',
        'file_size',
        'file_mime'
    ];

    /**
     * Get offer
     *
     * @return object
     */
    public function offer()
    {
        return $this->belongsTo(CustomOffer::class, 'offer_id');
    }
}
