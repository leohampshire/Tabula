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
        'redirect' => 'https://tabula.com.br/social/callback',
    ],

    'pagarme' => [
        'api_key' => 'ak_test_nw5MJ9qcAh7Y3HDyVKgl0rpcjObDvi',
        'encryption_key' =>'ek_test_PP6Jee727xq2wgIvyV0gQ24OrruAQl',
        'recipient_id' => 're_cjtk7atzv08pfha6eo3ob690p',
    ],

];
