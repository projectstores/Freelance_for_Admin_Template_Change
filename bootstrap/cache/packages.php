<?php return array (
  'akaunting/laravel-money' => 
  array (
    'providers' => 
    array (
      0 => 'Akaunting\\Money\\Provider',
    ),
  ),
  'akcybex/laravel-jazzcash' => 
  array (
    'providers' => 
    array (
      0 => 'AKCybex\\JazzCash\\AKJazzCashServiceProvider',
    ),
    'aliases' => 
    array (
      'JazzCash' => 'AKCybex\\JazzCash\\Facades\\JazzCash',
    ),
  ),
  'artesaos/seotools' => 
  array (
    'providers' => 
    array (
      0 => 'Artesaos\\SEOTools\\Providers\\SEOToolsServiceProvider',
    ),
    'aliases' => 
    array (
      'SEOMeta' => 'Artesaos\\SEOTools\\Facades\\SEOMeta',
      'OpenGraph' => 'Artesaos\\SEOTools\\Facades\\OpenGraph',
      'Twitter' => 'Artesaos\\SEOTools\\Facades\\TwitterCard',
      'JsonLd' => 'Artesaos\\SEOTools\\Facades\\JsonLd',
      'SEO' => 'Artesaos\\SEOTools\\Facades\\SEOTools',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facades\\Debugbar',
    ),
  ),
  'blade-ui-kit/blade-icons' => 
  array (
    'providers' => 
    array (
      0 => 'BladeUI\\Icons\\BladeIconsServiceProvider',
    ),
  ),
  'cartalyst/stripe-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Cartalyst\\Stripe\\Laravel\\StripeServiceProvider',
    ),
    'aliases' => 
    array (
      'Stripe' => 'Cartalyst\\Stripe\\Laravel\\Facades\\Stripe',
    ),
  ),
  'cloudinary-labs/cloudinary-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'CloudinaryLabs\\CloudinaryLaravel\\CloudinaryServiceProvider',
    ),
    'aliases' => 
    array (
      'Cloudinary' => 'CloudinaryLabs\\CloudinaryLaravel\\Facades\\Cloudinary',
    ),
  ),
  'edwardhendrix/laravel-config-writer' => 
  array (
    'providers' => 
    array (
      0 => 'October\\Rain\\Config\\ServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'jenssegers/agent' => 
  array (
    'providers' => 
    array (
      0 => 'Jenssegers\\Agent\\AgentServiceProvider',
    ),
    'aliases' => 
    array (
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'livewire/livewire' => 
  array (
    'providers' => 
    array (
      0 => 'Livewire\\LivewireServiceProvider',
    ),
    'aliases' => 
    array (
      'Livewire' => 'Livewire\\Livewire',
    ),
  ),
  'loveycom/cashfree' => 
  array (
    'providers' => 
    array (
      0 => 'LoveyCom\\CashFree\\CashFreeServiceProvider',
    ),
  ),
  'lukeraymonddowning/honey' => 
  array (
    'providers' => 
    array (
      0 => 'Lukeraymonddowning\\Honey\\Providers\\HoneyServiceProvider',
    ),
    'aliases' => 
    array (
      'Honey' => 'Lukeraymonddowning\\Honey\\Facades\\Honey',
    ),
  ),
  'maatwebsite/excel' => 
  array (
    'providers' => 
    array (
      0 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
    ),
  ),
  'mailjet/laravel-mailjet' => 
  array (
    'providers' => 
    array (
      0 => 'Mailjet\\LaravelMailjet\\MailjetServiceProvider',
    ),
    'aliases' => 
    array (
      'Mailjet' => 'Mailjet\\LaravelMailjet\\Facades\\Mailjet',
    ),
  ),
  'mollie/laravel-mollie' => 
  array (
    'providers' => 
    array (
      0 => 'Mollie\\Laravel\\MollieServiceProvider',
    ),
    'aliases' => 
    array (
      'Mollie' => 'Mollie\\Laravel\\Facades\\Mollie',
    ),
  ),
  'munafio/chatify' => 
  array (
    'providers' => 
    array (
      0 => 'Chatify\\ChatifyServiceProvider',
    ),
    'aliases' => 
    array (
      'Chatify' => 'Chatify\\Facades\\ChatifyMessenger',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'opcodesio/log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Opcodes\\LogViewer\\LogViewerServiceProvider',
    ),
    'aliases' => 
    array (
      'LogViewer' => 'Opcodes\\LogViewer\\Facades\\LogViewer',
    ),
  ),
  'orangehill/iseed' => 
  array (
    'providers' => 
    array (
      0 => 'Orangehill\\Iseed\\IseedServiceProvider',
    ),
  ),
  'outhebox/blade-flags' => 
  array (
    'providers' => 
    array (
      0 => 'OutheBox\\BladeFlags\\BladeFlagsServiceProvider',
    ),
  ),
  'pharaonic/livewire-select2' => 
  array (
    'providers' => 
    array (
      0 => 'Pharaonic\\Livewire\\Select2\\Select2ServiceProvider',
    ),
  ),
  'ralphjsmit/livewire-urls' => 
  array (
    'providers' => 
    array (
      0 => 'RalphJSmit\\Livewire\\Urls\\LivewireUrlsServiceProvider',
    ),
    'aliases' => 
    array (
      'LivewireUrls' => 'RalphJSmit\\Livewire\\Urls\\Facades\\Url',
    ),
  ),
  'rtconner/laravel-tagging' => 
  array (
    'providers' => 
    array (
      0 => 'Conner\\Tagging\\Providers\\TaggingServiceProvider',
    ),
  ),
  'simplesoftwareio/simple-qrcode' => 
  array (
    'providers' => 
    array (
      0 => 'SimpleSoftwareIO\\QrCode\\QrCodeServiceProvider',
    ),
    'aliases' => 
    array (
      'QrCode' => 'SimpleSoftwareIO\\QrCode\\Facades\\QrCode',
    ),
  ),
  'socialiteproviders/manager' => 
  array (
    'providers' => 
    array (
      0 => 'SocialiteProviders\\Manager\\ServiceProvider',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'spatie/laravel-sitemap' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Sitemap\\SitemapServiceProvider',
    ),
  ),
  'srmklive/paypal' => 
  array (
    'providers' => 
    array (
      0 => 'Srmklive\\PayPal\\Providers\\PayPalServiceProvider',
    ),
    'aliases' => 
    array (
      'PayPal' => 'Srmklive\\PayPal\\Facades\\PayPal',
    ),
  ),
  'stevebauman/purify' => 
  array (
    'providers' => 
    array (
      0 => 'Stevebauman\\Purify\\PurifyServiceProvider',
    ),
    'aliases' => 
    array (
      'Purify' => 'Stevebauman\\Purify\\Facades\\Purify',
    ),
  ),
  'unicodeveloper/laravel-paystack' => 
  array (
    'providers' => 
    array (
      0 => 'Unicodeveloper\\Paystack\\PaystackServiceProvider',
    ),
    'aliases' => 
    array (
      'Paystack' => 'Unicodeveloper\\Paystack\\Facades\\Paystack',
    ),
  ),
  'wireui/wireui' => 
  array (
    'providers' => 
    array (
      0 => 'WireUi\\Providers\\WireUiServiceProvider',
    ),
    'aliases' => 
    array (
    ),
  ),
);