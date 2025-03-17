<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedProject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reported_projects';

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
        'user_id',
        'reason',
        'description',
        'is_seen'
    ];

    /**
     * Get reported project
     *
     * @return object
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Get user who reported this project
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
