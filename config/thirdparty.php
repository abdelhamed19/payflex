<?php
return [
    'oauth' => [
        'facebook' => [
            'client_id' => env('FACEBOOK_CLIENT_ID'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'redirect' => env('FACEBOOK_REDIRECT_URI'),
            'request_url' => 'https://www.facebook.com/v22.0/dialog/oauth',
            'response_type' => 'code',
            'scope' => 'email,public_profile',
            'access_token_url' => 'https://graph.facebook.com/v22.0/oauth/access_token',
            'user_info_url' => 'https://graph.facebook.com/me?fields=id,name,email,picture',
        ],
        'google' => [
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect' => env('GOOGLE_REDIRECT_URI'),
            'request_url' => 'https://accounts.google.com/o/oauth2/auth',
            'response_type' => 'code',
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile' .
                ' https://www.googleapis.com/auth/userinfo.email',
            'access_token_url' => 'https://oauth2.googleapis.com/token',
            'user_info_url' => 'https://www.googleapis.com/oauth2/v1/userinfo',
        ],
        'github' =>[
            'client_id' => env('GITHUB_CLIENT_ID'),
            'client_secret' => env('GITHUB_CLIENT_SECRET'),
            'redirect' => env('GITHUB_REDIRECT_URI'),
            'request_url' => 'https://github.com/login/oauth/authorize',
            'response_type' => 'code',
            'scope' => 'user',
            'access_token_url' => 'https://github.com/login/oauth/access_token',
            'user_info_url' => 'https://api.github.com/user',
        ]
    ]
];
