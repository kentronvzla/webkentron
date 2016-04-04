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

   'mailgun' => array(
        'domain' => 'sandboxe3073a7a230b479cb4bffaa660ca8041.mailgun.org',
        'secret' => 'key-8790d3e9f959ab822389400fd6360d22',
),

    'mandrill' => [
        'secret' => env('MANDRILL_API_KEY', ''),
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

];
