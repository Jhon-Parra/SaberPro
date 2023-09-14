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
    'microsoft' => [
        'client_id' => env('40fa8486-8a4e-4839-83a8-7793278ec0b8'),
        'client_secret' => env('e398e024-1277-459d-b301-6737dd2cd48e'),
        'redirect' => env('http://localhost/verifymicrosoft'),
    ],
   
    'graph' => [
        'client_id' => env('40fa8486-8a4e-4839-83a8-7793278ec0b8'),
        'client_secret' => env('e398e024-1277-459d-b301-6737dd2cd48e'),
        'redirect' => env('http://localhost/verifymicrosoft'),
    ],

];
