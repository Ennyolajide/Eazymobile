<?php

return [

    'site' => [
        'year' => 2019,
        'url' => env('APP_URL'),
        'name' => env('APP_NAME'),
        'spanName' => '<b>Eazy</b> Mobile',
        'logo' => '\images/logo.png',
        'email' => 'support@eazymobile.net',
        'phone' => '+234 9021 6666 08',
        'phone2' => '',

        'telegram' => 'https://t.me/eazymobilenig',
        'address' => 'Shop 15, off Gtbank, <br/>Alabata, Ogun State, Nigeria',
        'twitter' => 'https://www.t.me/eazymobilenig',
        'facebook' => 'https://facebook.com/eazymobilenig',
        'instagram' => 'https://instagram.com/eazymobilenig',
        'google' => '#',
        'linkedin' => '#',
        'bussinessName' => 'Eazy Mobile',
        'googleMap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.38262768085247!2d3.450448169084706!3d7.2269181021081685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103a37421bbc279f%3A0xbdd81c8328b04ef4!2sModelc%20Global%20Enterprise!5e0!3m2!1sen!2sng!4v1577543120150!5m2!1sen!2sng',
        'about' => 'Copyright &copy; 2018 EazyMobile.',
        'address' => 'Shop 15, off Gtbank, <br/>Alabata, Ogun State, Nigeria',
        'description' => 'CryptoCoin is a powerful Bitcoin Crypto Currency Wallet and Mining Template with full of customization options and features',
        'sms' => [
            'sender' => env('SITE_SMS_SENDER'),
        ],
        'api' => [
            'url' => '#'
        ]

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
    ],

    'freecurrencyconveter' => [
        'url' => 'https://free.currconv.com/api/v7/',
        'token' => env('FREE_CURRENCY_CONVERTER_API_TOKEN')
    ],

    'currencyconveter' => [
        'url' => 'https://api.currconv.com/api/v7/',
        'token' => env('CURRENCY_CONVERTER_API_TOKEN')
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

    'bitcoin' => [
        'funding' => [
            'min' => 10,
            'max' => 1000,
        ],
        'purchase' => [
            'min' => 25,
            'max' => 1000,
        ]
    ],

    'coinpayment' => [
        'key' => [
            'public' => env('COINPAYMENT_PUBLIC_KEY'),
            'private' => env('COINPAYMENT_PRIVATE_KEY')
        ],

        'ipnSecret' => env('COINPAYMENT_IPN_SECRET'),
        'debugEmail' => env('COINPAYMENT_DEBUG_EMAIL'),
        'merchantId' => env('COINPAYMENT_MERCHANT_ID'),

    ]

];
