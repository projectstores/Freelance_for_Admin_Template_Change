<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_article_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'article_id',
        'name',
        'email',
        'comment',
        'ip_address',
        'user_agent',
        'status',
    ];


    /**
     * Get article
     *
     * @return object
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
