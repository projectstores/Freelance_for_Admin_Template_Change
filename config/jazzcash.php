<?php

return [
    'environment' => 'sandbox',
    'sandbox'     => [
        'merchant_id'     => '00',
        'password'        => '00',
        'integerity_salt' => '00',
        'return_url'      => 'https://freelancer.net/callback/jazzcash',
        'endpoint'        => "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform/",
    ],
    'live'        => [
        'merchant_id'     => "",
        'password'        => "",
        'integerity_salt' => "",
        'return_url'      => "",
        'endpoint'        => "https://payments.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform",
    ],
];
