<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NowpaymentsSettings extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nowpayments_settings';

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
        'name',
        'is_enabled',
        'logo_id',
        'currency',
        'crypto_currency',
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
