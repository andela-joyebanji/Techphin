<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '164616147266856',
        'client_secret' => 'cd8caae6643f9dd1962b1fc3ed09bece',
        'redirect' => 'http://techphin.app/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '262589096853-3d9of82l2v4r8lqdos8a17jdchj05a4b.apps.googleusercontent.com',
        'client_secret' => 'ZkPCByFfnq3qAwfpWxuPkk4s',
        'redirect' => 'http://techphin.app/auth/google/callback',
    ],
    'twitter' => [
        'client_id' => 'mnEpq0Xeebm1NBOBZ4IkBMqgU',
        'client_secret' => 'no5Pi3U8rUVolc2x4ceqVImy02eL9lANeqAlwQKHuYoHetRlkn',
        'redirect' => 'http://techphin.app/auth/twitter/callback',
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
