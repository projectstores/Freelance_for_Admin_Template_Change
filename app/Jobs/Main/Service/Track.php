<?php

namespace App\Jobs\Main\Service;

use App\Models\Gig;
use App\Models\GigVisit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \DeviceDetector\DeviceDetector as DeviceDetector;
use \Dartui\BrowserLanguage\BrowserLanguage as BrowserLanguage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Track implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            
            // Get user data
            $data                     = $this->data;

            // First let's check if user already visited this gig before
            // So we only increment impression
            $isAlreadyVisited         = GigVisit::where('gig_id', $data['gig_id'])
                                        ->where('ip_address', $data['ip'])
                                        ->where('user_agent', $data['ua'])
                                        ->first();

            // Check if already visited
            if ($isAlreadyVisited) {
                
                // Update impressions and last visit
                $isAlreadyVisited->increment('impressions');
                $isAlreadyVisited->last_visit = now();
                $isAlreadyVisited->save();

                // Increment gig impressions
                Gig::where('id', $data['gig_id'])->update([
                    'counter_impressions' => DB::raw( 'counter_impressions + 1' ),
                ]);

                // Return 
                return;

            }

            // Get user ip address
            $ip_address               = $data['ip'];

            // Get user agent
            $user_agent               = $data['ua'];

            // Get device details
            $device                   = new DeviceDetector($user_agent);

            // Parse device data
            $device->parse();

            // Check if bot
            $is_bot                   = $device->isBot();

            // Get bot details
            $bot                      = $device->getBot();

            // Get bot name
            $bot_name                 = $is_bot && is_array($bot) ? $bot['name'] : null ;

            // Get bot category
            $bot_category             = $is_bot && is_array($bot) ? $bot['category'] : null ;

            // Get bot url
            $bot_url                  = $is_bot && is_array($bot) ? $bot['url'] : null ;

            // Bot producer name
            $bot_producer_name        = $is_bot && is_array($bot) && isset($bot['producer']) ? $bot['producer']['name'] : null ;

            // Get bot producer url
            $bot_producer_url         = $is_bot && is_array($bot) && isset($bot['producer']) ? $bot['producer']['url'] : null ;

            // Get device browser 
            $browser                  = $device->getClient();

            // Detect browser language
            try {
                $detect_browser_lang      = new BrowserLanguage($data['language']);
            } catch (\Throwable $e) {
                $detect_browser_lang      = null;
            }

            // Get browser name
            $browser_name             = is_array($browser) && isset($browser['name']) ? $browser['name'] : null;

            // Get browser version
            $browser_version          = is_array($browser) && isset($browser['version']) ? $browser['version'] : null;

            // Get browser language
            $browser_language         = $detect_browser_lang ? $detect_browser_lang->best() : null;

            // Get engine name
            $engine_name              = is_array($browser) && isset($browser['engine']) ? $browser['engine'] : null;

            // Get engine version
            $engine_version           = is_array($browser) && isset($browser['engine_version']) ? $browser['engine_version'] : null;

            // Get operating system
            $os                       = $device->getOs();

            // Get os name
            $os_name                  = is_array($os) && isset($os['name']) ? $os['name'] : null;

            // Get os version
            $os_version               = is_array($os) && isset($os['version']) ? $os['version'] : null;

            // Get device name
            $device_name              = $device->getBrandName() ? $device->getBrandName() : null;

            // Get device model
            $device_model             = $device->getModel() ? $device->getModel() : null;

            // Get device type
            $device_type              = $device->getDeviceName();

            // Get utm medium
            $utm_medium               = isset($data['utm_medium']) && !is_null($data['utm_medium']) ? substr($data['utm_medium'], 0, 500) : null;

            // Get utm campaign
            $utm_campaign             = isset($data['utm_campaign']) && !is_null($data['utm_campaign']) ? substr($data['utm_campaign'], 0, 500) : null;

            // Get utm source
            $utm_source               = isset($data['utm_source']) && !is_null($data['utm_source']) ? substr($data['utm_source'], 0, 500) : null;

            // Get url queries
            $url_queries              = isset($data['queries']) && !is_null($data['queries']) ? substr($data['queries'], 0, 500) : null;

            // Parse referrer url
            $parse_referrer           = isset($data['referrer']) && !is_null($data['referrer']) ? parse_url($data['referrer']) : null;

            // Get visit from domain url
            $visit_from               = $parse_referrer ? $parse_referrer['host'] : null;

            // Get referrer
            $referrer                 = isset($data['referrer']) && !is_null($data['referrer']) ? substr($data['referrer'], 0, 750) : null;

            // Get geo location details
            $geo                      = $this->geo($ip_address);

            // Get country name
            $country_name             = $geo['country_name'];

            // Get country code
            $country_code             = $geo['country_code'];

            // Get region name
            $region_name              = $geo['region_name'];

            // Get region code
            $region_code              = $geo['region_code'];

            // Get city name
            $city                     = $geo['city'];

            // Get zip code
            $zip                      = $geo['zip'];

            // Get area timezone
            $timezone                 = $geo['timezone'];

            // Get latitude
            $latitude                 = $geo['latitude'];

            // Get longitude
            $longitude                = $geo['longitude'];

            // Save visit
            $visit                    = new GigVisit();
            $visit->uid               = uid();
            $visit->gig_id            = $data['gig_id'];
            $visit->ip_address        = $ip_address;
            $visit->country_name      = $country_name;
            $visit->country_code      = $country_code;
            $visit->region_name       = $region_name;
            $visit->region_code       = $region_code;
            $visit->city              = $city;
            $visit->zip               = $zip;
            $visit->timezone          = $timezone;
            $visit->latitude          = $latitude;
            $visit->longitude         = $longitude;
            $visit->user_agent        = $user_agent;
            $visit->browser_name      = $browser_name;
            $visit->browser_version   = $browser_version;
            $visit->browser_language  = $browser_language;
            $visit->os_name           = $os_name;
            $visit->os_version        = $os_version;
            $visit->engine_name       = $engine_name;
            $visit->engine_version    = $engine_version;
            $visit->device_name       = $device_name;
            $visit->device_model      = $device_model;
            $visit->device_type       = $device_type;
            $visit->bot_name          = $bot_name;
            $visit->bot_category      = $bot_category;
            $visit->bot_url           = $bot_url;
            $visit->bot_producer_name = $bot_producer_name;
            $visit->bot_producer_url  = $bot_producer_url;
            $visit->utm_medium        = $utm_medium;
            $visit->utm_campaign      = $utm_campaign;
            $visit->utm_source        = $utm_source;
            $visit->url_queries       = $url_queries;
            $visit->visit_from        = $visit_from;
            $visit->referrer          = $referrer;
            $visit->save();

            // Increment visits
            Gig::where('id', $data['gig_id'])->update([
                'counter_impressions' => DB::raw( 'counter_impressions + 1' ),
                'counter_visits'      => DB::raw( 'counter_visits + 1' )
            ]);

        } catch (\Throwable $th) {
            \Log::debug($th);
            return;

        }
    }


    /**
     * Get geo locatio
     *
     * @param string $ip
     * @return array
     */
    private function geo($ip)
    {
        try {
            
            // Send request
            $response = Http::get("http://ip-api.com/json/$ip");
    
            // Get response as json
            $json     = $response->json();

            // Check if request succeeded
            if ( is_array($json) && isset($json['status']) && $json['status'] === 'success' ) {
                
                // Return ip success details
                return [
                    'country_name' => $json['country'],
                    'country_code' => $json['countryCode'],
                    'region_name'  => $json['regionName'],
                    'region_code'  => $json['region'],
                    'city'         => $json['city'],
                    'zip'          => $json['zip'],
                    'timezone'     => $json['timezone'],
                    'latitude'     => $json['lat'],
                    'longitude'    => $json['lon'],
                ];

            } else {

                // Failed
                return [
                    'country_name' => null,
                    'country_code' => null,
                    'region_name'  => null,
                    'region_code'  => null,
                    'city'         => null,
                    'zip'          => null,
                    'timezone'     => null,
                    'latitude'     => null,
                    'longitude'    => null,
                ];

            }

        } catch (\Throwable $th) {
            
            // Failed
            return [
                'country_name' => null,
                'country_code' => null,
                'region_name'  => null,
                'region_code'  => null,
                'city'         => null,
                'zip'          => null,
                'timezone'     => null,
                'latitude'     => null,
                'longitude'    => null,
            ];

        }
    }
}
