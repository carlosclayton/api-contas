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
        'model' => ApiContas\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1723716514382371',
        'client_secret' => '5026b9d2d24773d2265d37544df0348a',
        'redirect' => 'http://localhost:8000/'
    ],
    'google' => [
        'client_id' => '46822097390-vqvrbs8ta949qas59jctbrthsm2siv7g.apps.googleusercontent.com',
        'client_secret' => 'pYCMEvt36bLVTEr7Tr7FsEG4',
        'redirect' => 'http://localhost:8000/callback',
    ],
];
