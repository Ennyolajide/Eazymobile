<?php

return [

    'site' => [
        'year' => 2019,
        'url' => env('APP_URL'),
        'name' => env('APP_NAME'),
        'spanName' => strtolower('<span>Model</span>C'),
        'logo' => '\images/logo.png',
        'email' => 'support@modelc.com',
        'phone' => '+234 9066 6857 02',
        'telegram' => 'https://t.me/modelc',
        'address' => 'Camp,Abeokuta.Ogun State, Nigeria.',
        'twitter' => 'https://twitter.com/modelc',
        'facebook' => 'https://facebook.com/modelc',
        'instagram' => 'https://instagram.com/modelc',
        'google' => '#',
        'linkedin' => '#',
        'bussinessName' => 'ModelC',
        'googleMap' => 'https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d7916.862982549558!2d3.4318005225864616!3d7.1915070292316345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x103a363bcdd152df%3A0xf3ab70233638c6ec!2sCamp%2C+Abeokuta!3m2!1d7.194497999999999!2d3.4359531!5e0!3m2!1sen!2sng!4v1564561313169!5m2!1sen!2sng',
        'about' => '©2019 All Rights Reserved. Modelc is a business solution website. Privacy and Terms',
        'address' => 'Location: Shop 8, off Gtbank, Alabata <br>
        <span>FUNAAB, Abeokuta, NG</span>',

        'sms' => [
            'sender' => env('SITE_SMS_SENDER'),
        ],

        'emails' => [
            'sender' => [
                'name' => env('SITE_EMAIL_SENDER'),
                'noreply' => env('SITE_EMAIL_SENDER_NOREPLY'),
            ]

        ]
    ],

    'livechat' => [
        'tawk' => 'https://embed.tawk.to/5d9e09dff82523213dc67a21/default'
    ],

    'fundings' => [
        'paystack' => [
            'min' =>  500,
            'max' =>  50000,
        ]
    ],

    'url' => [
        'paystack' => 'https://api.paystack.co/',
        'ringo'  => 'https://sales.ringo.ng/api/',
        'smartsmssolutions' => 'https://smartsmssolutions.com/api/',
        'freecurrencyconveter' => 'https://free.currconv.com/api/v7/'
    ],

    'smartsmssolutions' => [
        'token' => env('SMARTSMSSOLUTION_TOKEN')
    ],

    'ringo' => [
        'username' => env('RINGO_USERNAME'),
        'password' => env('RINGO_PASSWORD'),
    ],

    'paystack' => [
        'secretkey' => env('PAYSTACK_SECRET_KEY'),
    ],


    'charges' => [
        'paystack' => [
            'cappedCharge' => 2000,
            'addtionalCharge' => 100,
            'chargePercentage' => 1.5,
        ],
    ],

    'bonuses' => [
        'referral' => 150,
    ],
    env('SMARTSMSSOLUTION_TOKEN')



];
