<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '679193755843490',
        'client_secret' => '78a8513ac6108ac98ad3b699de3b0957',
        'redirect' => 'http://tabula.test/facebook/callback',
    ],

    'pagarme' => [
        'api_key' => 'ak_test_EHrIO0g0eb60TqcuM2Sc1Tq5JQV5Hi',
        'encryption_key' =>'ek_test_BAungYpRc4WGgApTuLGEBBzrauSpcN',
        'recipient_id' => 're_cj2tbe8f103ewt66d6l8tgs37',
    ],

];
