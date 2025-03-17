<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterList extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsletter_list';


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
    protected $fillable = ['uid', 'email', 'ip_address', 'status'];
}
