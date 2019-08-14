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
        'redirect' => 'https://tabula.com.br/social/facebook/callback',
    ],
    'google' => [
        'client_id' => '612767872532-243ng3sc0chq0sp70s87eocjeoem7k5p.apps.googleusercontent.com',
        'client_secret' => 'mWipvwkS9V59OY5Q2M2NylXW',
        'redirect' => 'https://tabula.com.br/social/google/callback',
    ],
    

    'pagarme' => [
        'api_key' => 'ak_live_VJinHgDzqz8wMhCZCjSrNEdL0s9e86',
        'encryption_key' =>'ek_live_KiNc4gMdgtmKizLJV7D3zk1c2etYIk',
        'recipient_id' => 're_cjvfhdbp52kd5km64czduqj8c',
    ],

];
