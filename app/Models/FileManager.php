<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file_manager';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'file_folder',
        'file_size',
        'file_mimetype',
        'file_extension',
        'uploader_type',
        'uploader_id'
    ];

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'uploaded_at';
}
