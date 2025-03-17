<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositTransaction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deposits_transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transaction_id',
        'payment_method',
        'amount_total',
        'amount_fee',
        'amount_net',
        'currency',
        'exchange_rate',
        'status',
        'reject_reason',
        'ip_address'
    ];

    /**
     * Get user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
