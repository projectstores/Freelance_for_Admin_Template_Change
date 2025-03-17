<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsStartSelling extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_start_selling';

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
        'banner_bg_id',
        'banner_icon_id',
        'hiw_svg_1_id',
        'hiw_svg_2_id',
        'hiw_svg_3_id',
        'freelancer_image_1_id',
        'freelancer_image_2_id',
        'freelancer_image_3_id',
        'freelancer_image_4_id',
        'freelancer_name_1',	
        'freelancer_name_2',	
        'freelancer_name_3',	
        'freelancer_name_4',	
        'freelancer_job_1',	
        'freelancer_job_2',	
        'freelancer_job_4',	
        'buyer_image_1_id',
        'buyer_image_2_id',
        'buyer_image_3_id',
        'buyer_name_1',	
        'buyer_name_2',	
        'buyer_name_3',	
        'buyer_job_1',	
        'buyer_job_2',	
        'buyer_job_3',	
        'buyer_review_1',
        'buyer_review_2',
        'buyer_review_3',
        'show_how_it_works',	
        'show_freelancers',	
        'show_testimonials',	
        'show_faq',
    ];

    /**
     * Get image
     *
     * @return object
     */
    public function banner_bg()
    {
        return $this->belongsTo(FileManager::class, 'banner_bg_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function banner_icon()
    {
        return $this->belongsTo(FileManager::class, 'banner_icon_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function hiw_svg_1()
    {
        return $this->belongsTo(FileManager::class, 'hiw_svg_1_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function hiw_svg_2()
    {
        return $this->belongsTo(FileManager::class, 'hiw_svg_2_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function hiw_svg_3()
    {
        return $this->belongsTo(FileManager::class, 'hiw_svg_3_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function freelancer_image_1()
    {
        return $this->belongsTo(FileManager::class, 'freelancer_image_1_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function freelancer_image_2()
    {
        return $this->belongsTo(FileManager::class, 'freelancer_image_2_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function freelancer_image_3()
    {
        return $this->belongsTo(FileManager::class, 'freelancer_image_3_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function freelancer_image_4()
    {
        return $this->belongsTo(FileManager::class, 'freelancer_image_4_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function buyer_image_1()
    {
        return $this->belongsTo(FileManager::class, 'buyer_image_1_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function buyer_image_2()
    {
        return $this->belongsTo(FileManager::class, 'buyer_image_2_id');
    }
    
    /**
     * Get image
     *
     * @return object
     */
    public function buyer_image_3()
    {
        return $this->belongsTo(FileManager::class, 'buyer_image_3_id');
    }
}
