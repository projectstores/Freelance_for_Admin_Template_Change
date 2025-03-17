<?php

return [
    //These are for the Marketplace
    'appID'     => '',
    'secretKey' => '',
    'testURL'   => 'https://ces-gamma.cashfree.com',
    'prodURL'   => 'https://ces-api.cashfree.com',
    'maxReturn' => 100,                                //this is for request pagination
    'isLive'    => false,

    //For the PaymentGateway.
    'PG' => [
        'appID'     => 'TEST3695744a1905dee705712f94f0475963',
        'secretKey' => 'TEST97450c27f5655654a83ffe1189550040ba03de1c',
        'testURL'   => 'https://test.cashfree.com',
        'prodURL'   => 'https://api.cashfree.com',
        'isLive'    => true
    ]
];
