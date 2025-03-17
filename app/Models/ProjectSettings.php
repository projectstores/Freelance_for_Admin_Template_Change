<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSettings extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects_settings';

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
        'auto_approve_projects',
        'auto_approve_bids',
        'is_free_posting',
        'is_premium_posting',
        'is_premium_bidding',
        'commission_type',
        'commission_from_freelancer',
        'commission_from_publisher',
        'who_can_post'
    ];
}
