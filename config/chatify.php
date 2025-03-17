<?php

return [
    /*
    |-------------------------------------
    | Messenger display name
    |-------------------------------------
    */
    'name' => 'Live chat',

    /*
    |-------------------------------------
    | The disk on which to store added
    | files and derived images by default.
    |-------------------------------------
    */
    'storage_disk_name' => 'chat',

    /*
    |-------------------------------------
    | Routes configurations
    |-------------------------------------
    */
    'routes'     => [
        'prefix'     => "inbox",
        'middleware' => ['web','auth'],
        'namespace'  => "App\Http\Controllers\Chat",
    ],
    'api_routes' => [
        'prefix'     => "inbox/api",
        'middleware' => ['api'],
        'namespace'  => "App\Http\Controllers\Chat\Api",
    ],

    /*
    |-------------------------------------
    | Pusher API credentials
    |-------------------------------------
    */
    'pusher' => [
        'key'     => '5026c02f2c587ee07df0',
        'secret'  => '81e6fe3f639ffed0cca2',
        'app_id'  => '1585305',
        'options' => [
            'cluster'   => 'ap2',
            'encrypted' => 0,
        ],
    ],

    /*
    |-------------------------------------
    | User Avatar
    |-------------------------------------
    */
    'user_avatar' => [
        'folder' => 'users-avatar',
        'default' => 'avatar.png',
    ],

    /*
    |-------------------------------------
    | Gravatar
    |
    | imageset property options:
    | [ 404 | mp | identicon (default) | monsterid | wavatar ]
    |-------------------------------------
    */
    'gravatar' => [
        'enabled'    => false,
        'image_size' => 200,
        'imageset'   => 'identicon'
    ],

    /*
    |-------------------------------------
    | Attachments
    |-------------------------------------
    */
    'attachments' => [
        'folder'              => 'attachments',
        'download_route_name' => 'attachments.download',
        'allowed_images'      => (array) ['png','jpg','jpeg','gif'],
        'allowed_files'       => (array) ['zip','rar','txt', 'pdf'],
        'max_upload_size'     => 10, // MB
    ],

    /*
    |-------------------------------------
    | Messenger's colors
    |-------------------------------------
    */
    'colors' => (array) [
        '#2180f3',
        '#2196F3',
        '#00BCD4',
        '#3F51B5',
        '#673AB7',
        '#4CAF50',
        '#FFC107',
        '#FF9800',
        '#ff2522',
        '#9C27B0',
    ],

    /*
    |-------------------------------------
    | Sounds
    | You can enable/disable the sounds and
    | change sound's name/path placed at
    | `public/` directory of your app.
    |
    |-------------------------------------
    */
    'sounds' => [
        'enabled'     => true,
        'public_path' => 'js/chatify/sounds',
        'new_message' => 'new-message-sound.mp3',
    ]
];
