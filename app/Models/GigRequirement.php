<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigRequirement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gig_requirements';

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
        'gig_id',
        'question',
        'type',
        'is_required',
        'is_multiple'
    ];

    /**
     * Get requirement options
     *
     * @return object
     */
    public function options()
    {
        return $this->hasMany(GigRequirementOption::class, 'requirement_id');
    }
}
