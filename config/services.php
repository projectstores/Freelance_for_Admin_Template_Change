<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'secret' => '',
    ],

    /**
     * Social media login
     */
    'github' => [
        'client_id'     => 'Iv1.98f83da1eef01319',
        'client_secret' => '7d77789be7e6bf694f758b23abc14cce03a25cd5',
        'redirect'      => 'https://localhost/Freelancer_Work/Freelancer_Work_New/auth/github/callback',
    ],
    'linkedin' => [    
        'client_id'     => '000',
        'client_secret' => '00',
        'redirect'      => 'https://localhost/Freelancer_Work/Freelancer_Work_New/auth/linkedin/callback'
    ],
    'google' => [    
        'client_id'     => '136858468508-b4lnkl1jk7ju1rq1sjb6hp7dneunvitu.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'https://localhost/Freelancer_Work/Freelancer_Work_New/auth/google/callback'
    ],
    'facebook' => [    
        'client_id'     => '1247354326124914',
        'client_secret' => '4a619470f630ebbd10b2b8886d0160b3',
        'redirect'      => 'https://localhost/Freelancer_Work/Freelancer_Work_New/auth/facebook/callback'
    ],
    'twitter' => [    
        'client_id'     => '000',
        'client_secret' => '00',
        'redirect'      => 'https://localhost/Freelancer_Work/Freelancer_Work_New/auth/twitter/callback'
    ],

    // Email marketing
    'mailjet' => [
        'key'    => "",
        'secret' => "",
    ]

];
