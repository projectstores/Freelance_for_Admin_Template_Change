<?php

use Carbon\Carbon;
use App\Models\Gig;
use App\Models\User;
use App\Models\Level;
use App\Models\Order;
use App\Models\Refund;
use App\Models\Project;
use App\Models\Language;
use App\Models\ProjectBid;
use App\Models\CustomOffer;
use App\Models\ReportedGig;
use App\Models\SettingsSeo;
use App\Models\BlogSettings;
use App\Models\Notification;
use App\Models\OrderInvoice;
use App\Models\ReportedUser;
use App\Models\SettingsAuth;
use App\Models\SettingsHero;
use App\Models\Advertisement;
use App\Models\PaytrSettings;
use App\Models\SettingsMedia;
use App\Models\UserPortfolio;
use App\Models\VNPaySettings;
use App\Models\EpointSettings;
use App\Models\MollieSettings;
use App\Models\PaymobSettings;
use App\Models\PayPalSettings;
use App\Models\SettingsFooter;
use App\Models\StripeSettings;
use App\Models\SupportMessage;
use App\Models\XenditSettings;
use App\Models\PaytabsSettings;
use App\Models\ProjectSettings;
use App\Models\ReportedProject;
use App\Models\SettingsGeneral;
use App\Models\SettingsPublish;
use App\Models\CashfreeSettings;
use App\Models\JazzcashSettings;
use App\Models\PaystackSettings;
use App\Models\RazorpaySettings;
use App\Models\SettingsCurrency;
use App\Models\SettingsLiveChat;
use App\Models\SettingsSecurity;
use App\Models\ProjectBidUpgrade;
use App\Models\YoucanpaySettings;
use App\Models\DepositTransaction;
use App\Models\NewsletterSettings;
use App\Models\ProjectReportedBid;
use App\Models\SettingsAppearance;
use App\Models\SettingsCommission;
use App\Models\SettingsWithdrawal;
use App\Models\SettingsHome;
use App\Models\SettingsStartSelling;
use App\Models\VerificationCenter;
use App\Models\FlutterwaveSettings;
use App\Models\MercadopagoSettings;
use App\Models\NowpaymentsSettings;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\File;
use App\Models\OfflinePaymentGateway;
use App\Models\UserWithdrawalHistory;
use Illuminate\Support\Facades\Cache;
use App\Models\OfflinePaymentSettings;
use App\Models\AutomaticPaymentGateway;

/**
 * Generate unique string
 *
 * @param integer $length
 * @return string
 */
function uid($length = 20)
{
    $bytes  = random_bytes($length);
    $random = bin2hex($bytes);
    return strtoupper(substr($random, 0, $length));
}

/**
 * Format date
 *
 * @param string $timestamp
 * @param string $format
 * @return string
 */
function format_date($timestamp, $format = 'ago')
{
    // Set locale
    Carbon::setLocale(config()->get('backend_timing_locale'));

    // Check format type is ago
    if ($format === 'ago') {

        return Carbon::createFromTimeStamp(strtotime($timestamp), config('app.timezone'))->diffForHumans();

    } else {
        
        return Carbon::create($timestamp)->setTimezone(config('app.timezone'))->translatedFormat($format);

    }
}

/**
 * Make file size readable
 *
 * @param integer $size
 * @param integer $precision
 * @return string
 */
function format_bytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    } else {
        return $size;
    }
}

/**
 * Get file source
 *
 * @param object $file
 * @return string
 */
function src($file)
{
    // Check if file set
    if ($file) {
        
        // Get file path
        $path = public_path('storage/' . $file->file_folder . '/' . $file->uid . "." . $file->file_extension);

        // Check if file exists
        if (File::exists($path)) {
            
            // File exists, return url
            return url('public/storage/' . $file->file_folder . '/' . $file->uid . "." . $file->file_extension);

        }

        // File not found
        return placeholder_img();

    }

    // No file set
    return placeholder_img();
}


/**
 * Get admin url
 *
 * @param string $to
 * @param string $params
 * @return string
 */
function admin_url($to = null, $params = null)
{
    // Get dashboard prefix
    $prefix = config('global.dashboard_prefix');

    // Return url
    return !is_null($to) ? url("$prefix/$to", $params) : url("$prefix");
}

/**
 * Delete a file from a relation model
 *
 * @param object $file
 * @return void
 */
function deleteModelFile($file)
{
    try {
        
        // Check if file set
        if ($file) {
            
            // Get file path
            $path = public_path('storage/' . $file->file_folder . '/' . $file->uid . '.' . $file->file_extension);
    
            // Check if file exists
            if (File::exists($path)) {
                File::delete($path);
            }
    
            // Now delete it from database
            $file->delete();
    
        }

    } catch (\Throwable $th) {

        return;

    }
}

/**
 * Get settings from cache
 *
 * @param string $settings
 * @return object
 */
function settings($settings, $updateCache = false)
{
    // Check what settings you want
    switch ($settings) {

        case 'currency':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_currency');

            } else {

                // Return data
                return Cache::rememberForever('settings_currency', function () {
                    return SettingsCurrency::first();
                });

            }

        break;

        case 'publish':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_publish');

            } else {

                // Return data
                return Cache::rememberForever('settings_publish', function () {
                    return SettingsPublish::first();
                });

            }

        break;

        case 'commission':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_commission');

            } else {

                // Return data
                return Cache::rememberForever('settings_commission', function () {
                    return SettingsCommission::first();
                });

            }

        break;

        case 'media':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_media');

            } else {

                // Return data
                return Cache::rememberForever('settings_media', function () {
                    return SettingsMedia::first();
                });

            }

        break;

        case 'withdrawal':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_withdrawal');

            } else {

                // Return data
                return Cache::rememberForever('settings_withdrawal', function () {
                    return SettingsWithdrawal::first();
                });

            }

        break;

        case 'auth':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_auth');

            } else {

                // Return data
                return Cache::rememberForever('settings_auth', function () {
                    return SettingsAuth::first();
                });

            }

        break;

        case 'footer':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_footer');

            } else {

                // Return data
                return Cache::rememberForever('settings_footer', function () {
                    return SettingsFooter::first();
                });

            }

        break;

        case 'general':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_general');

            } else {

                // Return data
                return Cache::rememberForever('settings_general', function () {
                    return SettingsGeneral::first();
                });

            }

        break;
        
        case 'home':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_home');

            } else {

                // Return data
                return Cache::rememberForever('settings_home', function () {
                    return SettingsHome::with(['join_us_image', 'made_with_images', 'benefits_logo_1', 'benefits_logo_2', 'benefits_logo_3', 'benefits_logo_4'])->first();
                });

            }

        break;
        
        case 'start_selling':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_start_selling');

            } else {

                // Return data
                return Cache::rememberForever('settings_start_selling', function () {
                     
                    return SettingsStartSelling::with(['banner_bg','banner_icon','hiw_svg_1','hiw_svg_2','hiw_svg_3','freelancer_image_1','freelancer_image_2','freelancer_image_3','freelancer_image_4','buyer_image_1','buyer_image_2','buyer_image_3',])->first(); 
                     
                });

            }

        break;

        case 'security':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_security');

            } else {

                // Return data
                return Cache::rememberForever('settings_security', function () {
                    return SettingsSecurity::first();
                });

            }

        break;

        case 'seo':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_seo');

            } else {

                // Return data
                return Cache::rememberForever('settings_seo', function () {
                    return SettingsSeo::with('ogimage')->first();
                });

            }

        break;

        case 'newsletter':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('newsletter_settings');

            } else {

                // Return data
                return Cache::rememberForever('newsletter_settings', function () {
                    return NewsletterSettings::with('image')->first();
                });

            }

        break;

        // Blog settings
        case 'blog':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_blog');

            } else {

                // Return data
                return Cache::rememberForever('settings_blog', function () {
                    return BlogSettings::first();
                });

            }

        // Appearance settings
        case 'appearance':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_appearance');

            } else {

                // Return data
                return Cache::rememberForever('settings_appearance', function () {
                    return SettingsAppearance::with('placeholder')->first();
                });

            }

        break;

        // Offline payment settings
        case 'offline_payment':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_offline_payment');

            } else {

                // Return data
                return Cache::rememberForever('settings_offline_payment', function () {
                    return OfflinePaymentSettings::first();
                });

            }

        break;

        // Paystack payment settings
        case 'paystack':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paystack');

            } else {

                // Return data
                return Cache::rememberForever('settings_paystack', function () {
                    return PaystackSettings::first();
                });

            }

        break;

        // Cashfree payment settings
        case 'cashfree':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_cashfree');

            } else {

                // Return data
                return Cache::rememberForever('settings_cashfree', function () {
                    return CashfreeSettings::first();
                });

            }

        break;

        // Xendit payment settings
        case 'xendit':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_xendit');

            } else {

                // Return data
                return Cache::rememberForever('settings_xendit', function () {
                    return XenditSettings::first();
                });

            }

        break;

        // Projects settings
        case 'projects':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_projects');

            } else {

                // Return data
                return Cache::rememberForever('settings_projects', function () {
                    return ProjectSettings::first();
                });

            }

        break;

        // Flutterwave settings
        case 'flutterwave':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_flutterwave');

            } else {

                // Return data
                return Cache::rememberForever('settings_flutterwave', function () {
                    return FlutterwaveSettings::first();
                });

            }

        break;

        // Vnpay settings
        case 'vnpay':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_vnpay');

            } else {

                // Return data
                return Cache::rememberForever('settings_vnpay', function () {
                    return VNPaySettings::first();
                });

            }

        break;

        // Paymob settings
        case 'paymob':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paymob');

            } else {

                // Return data
                return Cache::rememberForever('settings_paymob', function () {
                    return PaymobSettings::first();
                });

            }

        break;

        // Mercadopago settings
        case 'mercadopago':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_mercadopago');

            } else {

                // Return data
                return Cache::rememberForever('settings_mercadopago', function () {
                    return MercadopagoSettings::first();
                });

            }

        break;

        // Paytabs settings
        case 'paytabs':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paytabs');

            } else {

                // Return data
                return Cache::rememberForever('settings_paytabs', function () {
                    return PaytabsSettings::first();
                });

            }

        break;

        // Razorpay settings
        case 'razorpay':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_razorpay');

            } else {

                // Return data
                return Cache::rememberForever('settings_razorpay', function () {
                    return RazorpaySettings::first();
                });

            }

        break;

        // Youcanpay settings
        case 'youcanpay':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_youcanpay');

            } else {

                // Return data
                return Cache::rememberForever('settings_youcanpay', function () {
                    return YoucanpaySettings::first();
                });

            }

        break;

        // Nowpayments settings
        case 'nowpayments':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_nowpayments');

            } else {

                // Return data
                return Cache::rememberForever('settings_nowpayments', function () {
                    return NowpaymentsSettings::with('logo')->first();
                });

            }

        break;

        // Jazzcash settings
        case 'jazzcash':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_jazzcash');

            } else {

                // Return data
                return Cache::rememberForever('settings_jazzcash', function () {
                    return JazzcashSettings::first();
                });

            }

        break;

        // Mollie settings
        case 'mollie':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_mollie');

            } else {

                // Return data
                return Cache::rememberForever('settings_mollie', function () {
                    return MollieSettings::first();
                });

            }

        break;

        // Paytr settings
        case 'paytr':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paytr');

            } else {

                // Return data
                return Cache::rememberForever('settings_paytr', function () {
                    return PaytrSettings::first();
                });

            }

        break;

        // Paypal settings
        case 'paypal':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_paypal');

            } else {

                // Return data
                return Cache::rememberForever('settings_paypal', function () {
                    return PayPalSettings::first();
                });

            }

        break;

        // Stripe settings
        case 'stripe':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_stripe');

            } else {

                // Return data
                return Cache::rememberForever('settings_stripe', function () {
                    return StripeSettings::first();
                });

            }

        break;

        // Epoint settings
        case 'epoint':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_epoint');

            } else {

                // Return data
                return Cache::rememberForever('settings_epoint', function () {
                    return EpointSettings::first();
                });

            }

        break;

        // Hero settings
        case 'hero':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_hero');

            } else {

                // Return data
                return Cache::rememberForever('settings_hero', function () {
                    return SettingsHero::with(['background_large', 'background_medium', 'background_small'])->first();
                });

            }

        break;

        // Live chat settings
        case 'live_chat':

            // Check if want to update cache
            if ($updateCache) {
                
                // Remove it from cache
                Cache::forget('settings_live_chat');

            } else {

                // Return data
                return Cache::rememberForever('settings_live_chat', function () {
                    return SettingsLiveChat::first();
                });

            }

        break;
        
        default:
            # code...
            break;
    }
}


/**
 * Get youtube id from url
 *
 * @param string $link
 * @return void
 */
function youtubeId($link)
{
    try {
        
        // Validate link
        if (preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches)) {
            return isset($matches[0]) ? $matches[0] : null;
        }

        // Not found
        return null;

    } catch (\Throwable $th) {
        // throw $th;
        return null;
    }
}

/**
 * Get delivery time translate
 *
 * @param integer $time
 * @return string
 */
function delivery_time_trans($time)
{
    switch ((int) $time) {
        case 1:
            return __('messages.t_1_day');
            break;
        case 2:
            return __('messages.t_2_days');
            break;
        case 3:
            return __('messages.t_3_days');
            break;
        case 4:
            return __('messages.t_4_days');
            break;
        case 5:
            return __('messages.t_5_days');
            break;
        case 6:
            return __('messages.t_6_days');
            break;
        case 7:
            return __('messages.t_1_week');
            break;
        case 14:
            return __('messages.t_2_weeks');
            break;
        case 21:
            return __('messages.t_3_weeks');
            break;
        case 30:
            return __('messages.t_1_month');
            break;
    }
}


/**
 * Get accepted mime types for requirements (files)
 *
 * @return string
 */
function acceptableRequirementsMimeTypes()
{
    try {
        
        // Get allowed requirement files extensions
        $allowed_extensions = settings('media')->requirements_file_allowed_extensions;

        // Separate extensions by comma
        $extensions         = explode(',', $allowed_extensions);

        // Set empty mime types array
        $accepted           = [];

        // Set mime object
        $mimes              = new \Mimey\MimeTypes;


        // Loop through allowed extensions
        foreach ($extensions as $ext) {
            
            // Get extension mime type
            $mime_type = $mimes->getMimeType($ext);

            // Add mime type to list
            array_push($accepted, $mime_type);

        }

        // Convert this accepted array to string
        return implode(', ', $accepted);

    } catch (\Throwable $th) {
        throw $th;
    }
}

/**
 * Get first letter of a domain
 *
 * @param string $url
 * @return string
 */
function getWebsiteFirstLetter($domain)
{
    try {
        
        // Remove www from domain
        $withoutWWW    = str_replace("www.", "", $domain);

        // Remove domain
        $withoutDomain = explode('.', $withoutWWW);

        // Get first letter
        $firstLetter   = strtoupper(substr($withoutDomain[0], 0, 1));

        // Return firt letter
        return $firstLetter;

    } catch (\Throwable $th) {
        // Something went wrong
        // Return default letter
        return "A";

    }
}

/**
 * Encrypt data
 *
 * We don't want to use default laravel encryption
 * @param string $data
 * @return string
 */
function safeEncrypt($data)
{
    $output         = false;
  
    $encrypt_method = 'AES-256-CBC';
    $secret_key     = 'WU9AHAl#Ra--WWre';
    $secret_iv      = 'M43Sy96JuvJ5N6jY';
  
    // hash
    $key            = hash('sha256', $secret_key);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv             = substr(hash('sha256', $secret_iv), 0, 16);
  
    $output         = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
    $output         = base64_encode($output);

    return $output;

}


/**
 * decrypted encrypted data
 *
 * @param string $encrypted
 * @return string
 */
function safeDecrypt($encrypted)
{
    $output         = false;
  
    $encrypt_method = 'AES-256-CBC';
    $secret_key     = 'WU9AHAl#Ra--WWre';
    $secret_iv      = 'M43Sy96JuvJ5N6jY';
  
    // hash
    $key            = hash('sha256', $secret_key);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv             = substr(hash('sha256', $secret_iv), 0, 16);
  
    $output         = openssl_decrypt(base64_decode($encrypted), $encrypt_method, $key, 0, $iv);

    return $output;
}


/**
 * Get supported languages
 *
 * @param boolean $clear_cache
 * @return object
 */
function supported_languages($clear_cache = false)
{
    // Check if want to clear cache
    if ($clear_cache) {
        
        // Clear old cache
        Cache::forget('supported_languages');

        // Return data
        return Cache::rememberForever('supported_languages', function () {
            return Language::where('is_active', true)->orderBy('name', 'asc')->get();
        });

    } else {

        // Return data
        return Cache::rememberForever('supported_languages', function () {
            return Language::where('is_active', true)->orderBy('name', 'asc')->get();
        });

    }
}

/**
 * Clean text
 *
 * @param string $text
 * @return string
 */
function clean($text)
{
    try {
        
        return \Purify::clean($text);

    } catch (\Throwable $th) {
        return $text;
    }
}

/**
 * Retrieve size
 *
 * @param integer $size
 * @param integer $precision
 * @return string
 */
function human_filesize($size, $precision = 2) {
    $units = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
    $step  = 1024;
    $i     = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision). ' ' .$units[$i];
}


/**
 * Set seo title
 *
 * @param string $title
 * @param boolean $isDashboard
 * @return string
 */
function setSeoTitle($title, $isDashboard = false)
{
    // Set site title
    $site_title = settings('general')->title;

    // Set title separator
    $separator  = settings('general')->separator;

    // Check if want title for dashboard
    if ($isDashboard) {
        
        // Return title
        return $title . " $separator " . __('messages.t_dashboard');

    }

    // Return titlte for main pages
    return $title . " $separator " . $site_title;
}


/**
 * Save notification
 *
 * @param array $data
 * @return object
 */
function notification(array $data)
{
    // Save notification
    $notification          = new Notification();
    $notification->uid     = uid();
    $notification->user_id = $data['user_id'];
    $notification->text    = $data['text'];
    $notification->action  = $data['action'];
    $notification->params  = isset($data['params']) ? $data['params'] : null;
    $notification->save();

    // Return notification
    return $notification;
}


/**
 * Get advertisements
 *
 * @param string $name
 * @param boolean $updateCache
 * @return void
 */
function advertisements($name = null, $updateCache = false)
{
    // Check if want to update cache
    if ($updateCache) {
        
        // Clear old cache
        Cache::forget('advertisements');

        // Save ads
        Cache::rememberForever('advertisements', function () {
            return Advertisement::first();
        });

    } else {

        // Get ads
        $ads = Cache::rememberForever('advertisements', function () {
            return Advertisement::first();
        });

        // Return ad
        return $ads->$name;

    }
}

/**
 * Check if application installed
 *
 * @return boolean
 */
function isInstalled()
{
    try {

        // Get installation route file path
        $path = base_path('routes/install.php');

        // Check if file exists
        if (File::exists($path)) {

            // Installation not finished yet
            return false;

        }

        // Connect db
        // DB::connection()->getPDO();

        // // Check if there is a connection
        // if (!DB::connection()->getDatabaseName()) {
        //     return false;
        // }

        // Application is live
        return true;

    } catch (\Exception $e) {
        
        // Not connected
        return false;

    }
}

/**
 * Convert HEX to HSL
 *
 * @param string $RGB
 * @param integer $ladj
 * @return array
 */
function hex2hsl($RGB, $ladj = 0) 
{
    //have we got an RGB array or a string of hex RGB values (assume it is valid!)
    if (!is_array($RGB)) {
        $hexstr = ltrim($RGB, '#');
        if (strlen($hexstr) == 3) {
            $hexstr = $hexstr[0] . $hexstr[0] . $hexstr[1] . $hexstr[1] . $hexstr[2] . $hexstr[2];
        }
        $R = hexdec($hexstr[0] . $hexstr[1]);
        $G = hexdec($hexstr[2] . $hexstr[3]);
        $B = hexdec($hexstr[4] . $hexstr[5]);
        $RGB = array($R,$G,$B);
    }

    // scale the RGB values to 0 to 1 (percentages)
    $r   = $RGB[0]/255;
    $g   = $RGB[1]/255;
    $b   = $RGB[2]/255;
    $max = max( $r, $g, $b );
    $min = min( $r, $g, $b );

    // lightness calculation. 0 to 1 value, scale to 0 to 100% at end
    $l   = ( $max + $min ) / 2;
            
    // saturation calculation. Also 0 to 1, scale to percent at end.
    $d   = $max - $min;
    if( $d == 0 ){

        // achromatic (grey) so hue and saturation both zero
        $h = $s = 0; 

    } else {

        $s = $d / ( 1 - abs( (2 * $l) - 1 ) );
        // hue (if not grey) This is being calculated directly in degrees (0 to 360)
        switch( $max ){
            case $r:
                $h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
                if ($b > $g) { //will have given a negative value for $h
                    $h += 360;
                }
                break;
            case $g:
                $h = 60 * ( ( $b - $r ) / $d + 2 );
                break;
            case $b:
                $h = 60 * ( ( $r - $g ) / $d + 4 );
                break;
        }

    }

    // make any lightness adjustment required
    if ($ladj > 0) {
        $l += (1 - $l) * $ladj/100;
    } elseif ($ladj < 0) {
        $l += $l * $ladj/100;
    }

    //put the values in an array and scale the saturation and lightness to be percentages
    $hsl = array( round( $h), round( $s*100), round( $l*100) );
    
    // Return array
    return $hsl;
}


/**
 * Format currency
 *
 * @param string $amount
 * @return string
 */
function _price($amount)
{
    try {
        
        // Get currency settings
        $currency = settings('currency');

        return money($amount, $currency->code, true);

    } catch (\Throwable $th) {
        
        // Something went wrong
        return $amount;

    }
}

/**
 * Get country flag image
 *
 * @param string $code
 * @return string
 */
function countryFlag($code)
{
    return url('public/vendor/blade-flags/country-' . strtolower($code) . '.svg');
}

/**
 * Check if you are on localhost
 *
 * @return boolean
 */
function is_localhost()
{
    try {
        
        // check 
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')) ? true : false;
        }

        return true;

    } catch (\Throwable $th) {
        return true;
    }
}

/**
 * Compute hash
 *
 * @param sring $secret
 * @param string $payload
 * @return string
 */
function compute_hash($secret, $payload)
{
    $hexHash    = hash_hmac('sha256', $payload, mb_convert_encoding($secret, 'utf8'));
    $base64Hash = base64_encode(hex2bin($hexHash));
    return $base64Hash;
}
 
/**
 * Verify Hash
 *
 * @param string $secret
 * @param string $payload
 * @param string $verify
 * @return boolean
 */
function hash_is_valid($secret, $payload, $verify)
{
    $computed_hash = compute_hash($secret, $payload);
    return hash_equals($verify,$computed_hash);
}

/**
 * Generate jazzcash secure hash
 *
 * @param array $payload
 * @return string
 */
function generate_jazzcash_hash($payload)
{
    // Get jazzcash salt key
    $jazzcash_salt       = payment_gateway('jazzcash')?->settings['integerity_salt'];

    $sortedResponseArray = array();

    if (!empty($payload)) {
        foreach ($payload as $key => $val) {
            $sortedResponseArray[$key] = $val;
        }
    }

    ksort($sortedResponseArray);

    $hashString = $jazzcash_salt;

    foreach ($sortedResponseArray as $key => $val) {
        if (!empty($val) && ($val != 'null' || $val != null)) {
            $hashString .= '&' . $val;
        }
    }

    return strtoupper(hash_hmac('sha256', $hashString, $jazzcash_salt));
}

/**
 * Get category name
 *
 * @param string $type
 * @param object $category
 * @return string
 */
function category_title($type, $category)
{
    try {
        
        // Get current locale
        $locale = strtolower(app()->getLocale());

        // Check type
        if ($type === 'projects') {
            
            // Check if category has translations
            if ($category->translation()->count()) {
                
                // Get category translations
                $trans = $category->translation;

                // Set empty name value
                $name  = $category->name;

                // Loop through translations
                foreach ($trans as $t) {
                    
                    // Check if there is translation for current locale
                    if (strtolower($t->language_code) == $locale) {
                        
                        // Set name
                        $name = $t->language_value;
                        break;

                    }

                }

                // Return category name
                return $name;

            } else {

                // Has no translations
                return $category->name;

            }


        }

    } catch (\Throwable $th) {

        // Something went wrong
        return $category->name;

    }
}

/**
 * Add 3 dot to long paragraph
 *
 * @param string $string
 * @param string $repl
 * @param int $limit
 * @return string
 */
function add_3_dots($string, $limit, $repl = "...") 
{
    if(strlen($string) > $limit) {
        return mb_strimwidth($string, 0, $limit, "...");
    } else {
        return $string;
    }
}

/**
 * Render star rating
 *
 * @param mixed $rating
 * @param integer $maxRating
 * @return string
 */
function render_star_rating($rating, $width = "1rem", $height = "1rem", $empty_color = "#a6a6a6", $full_color = "#ffb322") 
{

    // Full star
    $fullStar = '<li><svg width="' . $width . '" height="' . $height . '" style="color:' . $full_color . ';" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg></li>';

    // Empty star
    $emptyStar = '<li><svg width="' . $width . '" height="' . $height . '" style="color:' . $empty_color . ';" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg></li>';

    // Set half star
    $halfStar  = '<li><svg width="' . $width . '" height="' . $height . '" style="color:' . $full_color . ';" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 536 512" xmlns="http://www.w3.org/2000/svg"><path d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"></path></svg></li>';

    // Set rating
    $rating    = $rating <= 5 ? $rating : 5;

    $fullStarCount  = (int)$rating;
    $halfStarCount  = ceil((float)$rating)-$fullStarCount;
    $emptyStarCount = 5 -$fullStarCount-$halfStarCount;

    $html  = str_repeat($fullStar,$fullStarCount);
    $html .= str_repeat($halfStar,$halfStarCount);
    $html .= str_repeat($emptyStar,$emptyStarCount);
    $html  = '<ul class="flex space-x-1 rtl:space-x-reverse justify-center">'.$html.'</ul>';
    return $html;
}

/**
 * Get default image url
 *
 * @return string
 */
function placeholder_img()
{
    try {
        
        // Get appearance settings
        $settings = settings('appearance');

        // Check if has placeholder image
        if ($settings->placeholder) {
            
            // Get image path
            $path = public_path('storage/' . $settings->placeholder->file_folder . '/' . $settings->placeholder->uid . '.' . $settings->placeholder->file_extension);

            // Check if this image exists
            if (File::exists($path)) {
                
                // Return this image
                return url('public/storage/' . $settings->placeholder->file_folder . '/' . $settings->placeholder->uid . '.' . $settings->placeholder->file_extension);

            }

            // If does not exists return default image
            return url('public/storage/default/default-placeholder.jpg');

        } else {

            // Not found
            return url('public/storage/default/default-placeholder.jpg');

        }

    } catch (\Throwable $th) {
        
        // Something went wrong, return default image
        return url('public/storage/default/default-placeholder.jpg');

    }
}

/**
 * Get livewire asset path
 *
 * @return mixed
 */
function livewire_asset_path()
{
    try {
        
        $manifest          = json_decode(file_get_contents(base_path('vendor/livewire/livewire/dist/manifest.json')), true);
        $versionedFileName = $manifest['/livewire.js'];
        return url("public/vendor/livewire{$versionedFileName}");

    } catch (\Throwable $th) {
        return null;
    }
}

/**
 * Convert to number
 *
 * @param mixed $value
 * @return mixed
 */
function convertToNumber($value) {
    if (is_numeric($value)) {
        $int   = (int)$value;
        $float = (float)$value;

        $value = ($int == $float) ? $int : $float;
        return $value;
    } else {
        return $value;
    }
}


/**
 * Convert long numbers to readable numbers
 *
 * @param mixed $n
 * @return string
 */
function readable_number($n)
{
    try {
        
        if ($n >= 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } elseif ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } elseif ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } elseif ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } elseif ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }
    
        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;

    } catch (\Throwable $th) {
        return $n;
    }
}


/**
 * Get current theme
 *
 * @return string
 */
function current_theme()
{
    try {
        
        // Get appearance settings
        $settings = settings('appearance');

        // Check if theme switcher enabled
        if ($settings->is_theme_switcher) {
            
            // Get cookies
            $cookie = Cookie::get('default_theme');

            // Check cookie
            if ($cookie && $cookie === 'light') {
                
                // Light mode
                return "light";

            } else if ($cookie && $cookie === 'dark') {

                // Dark mode
                return 'dark';

            } else {

                // Return default theme
                if (in_array($settings->default_theme, ['light', 'dark'])) {
                    return $settings->default_theme;
                } else {
                    return 'light';
                }

            }

        } else {

            // Return default theme
            return $settings->default_theme;

        }

    } catch (\Throwable $th) {
        
        // Something went wrong
        return 'light';

    }    
}


/**
 * Get pending notifications for admin
 *
 * @return array
 */
function pending_admin_notifications():array
{
    try {
        
        // Count pending users
        $count_pending_users                  = User::where('status', 'pending')->count();

        // Count pending deposit transactions
        $count_pending_deposit_transactions   = DepositTransaction::where('payment_method', 'offline_payment')->where('status', 'pending')->count();

        // Count pending gigs
        $count_pending_gigs                   = Gig::where('status', 'pending')->count();

        // Count pending projects
        $count_pending_projects               = Project::where('status', 'pending_approval')->count();

        // Count pending bids subscriptions
        $count_pending_bids_subscriptions     = ProjectBidUpgrade::where('status', 'pending')->count();

        // Count reported bids
        $count_reported_bids                  = ProjectReportedBid::where('is_seen', false)->count();

        // Count pending projects subscriptions
        $count_pending_projects_subscriptions = ProjectSubscription::where('status', 'pending')->count();

        // Count pending refunds
        $count_pending_refunds                = Refund::where('is_seen_by_admin', false)->whereIn('status', ['pending', 'rejected_by_seller'])->where('request_admin_intervention', true)->count();

        // Count reported gigs
        $count_reported_gigs                  = ReportedGig::where('status', 'pending')->count();

        // Count reported projects
        $count_reported_projects              = ReportedProject::where('is_seen', false)->count();

        // Count reported users
        $count_reported_users                 = ReportedUser::where('is_seen', false)->count();

        // Count new support messages
        $count_new_support_messages           = SupportMessage::where('is_seen', false)->count();

        // Count pending withdrawals
        $count_pending_payouts                = UserWithdrawalHistory::where('status', 'pending')->count();

        // Count pending portfolio projects
        $count_pending_portfolio_projects     = UserPortfolio::where('status', 'pending')->count();

        // Count pending verifications
        $count_pending_verifications          = VerificationCenter::where('status', 'pending')->count();

        // Count pending checkout payments
        $count_pending_checkout_payments      = OrderInvoice::where('status', 'pending')->count();

        // Count pending bids
        $count_pending_bids                   = ProjectBid::where('status', 'pending_approval')->count();

        // Count pending offers
        $count_pending_offers                 = CustomOffer::where('admin_status', 'pending')->count();

        // Count total pending notifications
        $total                                = convertToNumber($count_pending_users) + convertToNumber($count_pending_deposit_transactions) + convertToNumber($count_pending_gigs) + convertToNumber($count_pending_projects) + convertToNumber($count_pending_bids_subscriptions) + convertToNumber($count_reported_bids) + convertToNumber($count_pending_projects_subscriptions) + convertToNumber($count_pending_refunds) + convertToNumber($count_reported_gigs) + convertToNumber($count_reported_projects) + convertToNumber($count_reported_users) + convertToNumber($count_new_support_messages) + convertToNumber($count_pending_payouts) + convertToNumber($count_pending_portfolio_projects) + convertToNumber($count_pending_verifications) + convertToNumber($count_pending_checkout_payments) + convertToNumber($count_pending_bids) + convertToNumber($count_pending_offers);

        // Return data
        return [
            'count_pending_users'                  => $count_pending_users,
            'count_pending_deposit_transactions'   => $count_pending_deposit_transactions,
            'count_pending_gigs'                   => $count_pending_gigs,
            'count_pending_projects'               => $count_pending_projects,
            'count_pending_bids_subscriptions'     => $count_pending_bids_subscriptions,
            'count_reported_bids'                  => $count_reported_bids,
            'count_pending_projects_subscriptions' => $count_pending_projects_subscriptions,
            'count_pending_refunds'                => $count_pending_refunds,
            'count_reported_gigs'                  => $count_reported_gigs,
            'count_reported_projects'              => $count_reported_projects,
            'count_reported_users'                 => $count_reported_users,
            'count_new_support_messages'           => $count_new_support_messages,
            'count_pending_payouts'                => $count_pending_payouts,
            'count_pending_portfolio_projects'     => $count_pending_portfolio_projects,
            'count_pending_verifications'          => $count_pending_verifications,
            'count_pending_checkout_payments'      => $count_pending_checkout_payments,
            'count_pending_bids'                   => $count_pending_bids,
            'count_pending_offers'                 => $count_pending_offers,
            'total'                                => convertToNumber($total)
        ];

    } catch (\Throwable $th) {
        
        // Error
        return [
            'count_pending_users'                  => 0,
            'count_pending_deposit_transactions'   => 0,
            'count_pending_gigs'                   => 0,
            'count_pending_projects'               => 0,
            'count_pending_bids_subscriptions'     => 0,
            'count_reported_bids'                  => 0,
            'count_pending_projects_subscriptions' => 0,
            'count_pending_refunds'                => 0,
            'count_reported_gigs'                  => 0,
            'count_reported_projects'              => 0,
            'count_reported_users'                 => 0,
            'count_new_support_messages'           => 0,
            'count_pending_payouts'                => 0,
            'count_pending_portfolio_projects'     => 0,
            'count_pending_verifications'          => 0,
            'count_pending_checkout_payments'      => 0,
            'count_pending_bids'                   => 0,
            'count_pending_offers'                 => 0,
            'total'                                => 0
        ];

    }
}


/**
 * Check user level
 *
 * @param mixed $id
 * @return mixed
 */
function check_user_level($user_id = null)
{
    try {
        
        // Check if a specific user id is set
        if ($user_id) {

            // Get user
            $user = User::find($user_id);

        } else {

            // Get current user
            $user = auth()->user();

        }

        // Get current level
        $current_level = $user->level;

        // Get user account type
        $account_type  = $user->account_type;

        // Check account type
        if ($account_type === 'seller') {
            
            // Get sales
            $sales_count = (int)$user->sales()->count();

            // Get next level
            $next_level  = Level::where('id', '!=', $current_level->id)
                                ->where('account_type', 'seller')
                                ->where(function ($query) use ($sales_count) {
                                    $query->where('seller_sales_min', '<=', $sales_count);
                                    $query->where('seller_sales_max', '>=', $sales_count);
                                })
                                ->latest('id')
                                ->first();

            // Check if there is a new level
            if ($next_level) {
                
                // Update user's current level
                $user->level_id = $next_level->id;
                $user->save();

            }

        } else {

            // count total purchases
            $purchases_count = (int)Order::where('buyer_id', $user->id)->count();

            // Get next level
            $next_level      = Level::where('id', '!=', $current_level->id)
                                    ->where('account_type', 'buyer')
                                    ->where(function ($query) use ($purchases_count) {
                                        $query->where('buyer_purchases_min', '<=', $purchases_count);
                                        $query->where('buyer_purchases_max', '>=', $purchases_count);
                                    })
                                    ->latest('id')
                                    ->first();

            // Check if there is a new level
            if ($next_level) {
                
                // Update user's current level
                $user->level_id = $next_level->id;
                $user->save();

            }

        }

    } catch (\Throwable $th) {
        
        // Something went wrong
        return;

    }
}


/**
 * Get a payment gateway settings
 *
 * @param string $slug
 * @param bool $update
 * @return object
 */
function payment_gateway($slug, $update = false, $is_offline = false)
{
    try {
        
        // Check if want to update cache
        if ($update) {
                
            // Check if offline payment gateway
            if ($is_offline) {
                
                // Remove it from cache
                Cache::forget('offline_payment_gateway_settings_' . $slug);

            } else {

                // Remove it from cache
                Cache::forget('automatic_payment_gateway_settings_' . $slug);

            }

        } else {

            // Check if offline payment gateway
            if ($is_offline) {
                
                // Return data
                return Cache::rememberForever('offline_payment_gateway_settings_' . $slug, function () use ($slug) {

                    // Get the payment gateway
                    $gateway = OfflinePaymentGateway::where('slug', $slug)->with('logo')->first();

                    // Check if exists
                    if ($gateway) {
                        
                        // Return settings
                        return $gateway;

                    } else {

                        // Not found, return an empty object
                        return null;

                    }

                });

            }

            // Return data
            return Cache::rememberForever('automatic_payment_gateway_settings_' . $slug, function () use ($slug) {

                // Get the payment gateway
                $gateway = AutomaticPaymentGateway::where('slug', $slug)->with('logo')->first();

                // Check if exists
                if ($gateway) {
                    
                    // Return settings
                    return $gateway;

                } else {

                    // Not found, return an empty object
                    return null;

                }

            });

        }

    } catch (\Throwable $th) {
        
        // Not found, return an empty object
        return null;

    }    
}