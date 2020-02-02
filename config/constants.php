<?php

return [

    'site' => [
        'year' => 2019,
        'url' => env('APP_URL'),
        'name' => env('APP_NAME'),
        'spanName' => strtolower('<sp an>Model</span>C'),
        'logo' => '\images/logo.png',
        'email' => 'support@modelc.com.ng',
        'phone' => '+234 8137 5406 52',
        'telegram' => 'https://t.me/modelc',
        'address' => 'Shop 8, off Gtbank, Alabata, Ogun State, Nigeria.',
        'twitter' => 'https://twitter.com/modelc',
        'facebook' => 'https://facebook.com/modelc',
        'instagram' => 'https://instagram.com/modelc',
        'google' => '#',
        'linkedin' => '#',
        'bussinessName' => 'ModelC',
        'googleMap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.38262768085247!2d3.450448169084706!3d7.2269181021081685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103a37421bbc279f%3A0xbdd81c8328b04ef4!2sModelc%20Global%20Enterprise!5e0!3m2!1sen!2sng!4v1577543120150!5m2!1sen!2sng',
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
        'tawk' => 'https://embed.tawk.to/5e02461d7e39ea1242a1afd2/default'
    ],

    'fundings' => [
        'paystack' => [
            'min' =>  500,
            'max' =>  2499,
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

];
