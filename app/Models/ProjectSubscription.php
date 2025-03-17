<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSubscription extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_subscriptions';

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
        'project_id',
        'total',
        'payment_method',
        'payment_id',
        'status',
        'receipt_id'
    ];


    /**
     * Get project
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
