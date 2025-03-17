<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePaymentSettings extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offline_payment_settings';

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
        'is_enabled',
        'name',
        'details',
        'logo_id',
        'exchange_rate',
        'deposit_fee'
    ];

    /**
     * Get logo
     *
     * @return object
     */
    public function logo()
    {
        return $this->belongsTo(FileManager::class, 'logo_id');
    }
}
