<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePaymentGateway extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offline_payment_gateways';

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
        'name',
        'slug',
        'logo_id',
        'currency',
        'exchange_rate',
        'fixed_fee',
        'percentage_fee',
        'deposit_min_amount',
        'deposit_max_amount',
        'details',
        'is_active',
        'country'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fixed_fee'      => 'array',
        'percentage_fee' => 'array',
    ];

    /**
     * Get payment method logo
     *
     * @return object
     */
    public function logo()
    {
        return $this->belongsTo(FileManager::class, 'logo_id');
    }
}
