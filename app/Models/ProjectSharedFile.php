<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSharedFile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_shared_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'project_id',
        'file_name',
        'file_size',
        'file_extension',
        'file_mime'
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
