<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannedIp extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banned_ips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ip_address', 'attempts'];
}
