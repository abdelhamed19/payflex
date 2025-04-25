<?php

namespace App\Services\Payments;

use App\Interfaces\PaymentHandleInterface;
use App\Services\BuildRequestClass;

class PaymobService extends BuildRequestClass implements PaymentHandleInterface
{
    private $paymobApiKey;
    private $paymobIntegrationIds;
    private $paymobSecretKey;
    private $baseUrl = 'https://accept.paymob.com';
    public function __construct()
    {
        $this->paymobApiKey = config('thirdparty.payments.paymob.api_key');
        $this->paymobSecretKey = config('thirdparty.payments.paymob.api_secret_key');
        $this->paymobIntegrationIds = [
            'card' => config('thirdparty.payments.paymob.card_integration_id'),
            'mobile' => config('thirdparty.payments.paymob.mobile_integration_id'),
            'paypal' => config('thirdparty.payments.paymob.paypal_integration_id'),
        ];
    }
    public function getToken()
    {
        $url = $this->baseUrl . '/api/auth/tokens';
        $data = [
            'api_key' => $this->paymobApiKey,
        ];
        $response = $this->requestWithHeaders($url, $data);
        if ($response && isset($response['token'])) {
            $token = $response['token'];
            return $token;
        } else {
            return null;
        }
    }
    public function createPayment($data)
    {
        $url = $this->baseUrl . '/v1/intention/';
        $headers = [
            'Authorization' => 'Token ' . $this->paymobSecretKey,
            'Content-Type' => 'application/json',
        ];

        $data = [
            'amount' => 2000,
            'currency' => 'EGP',
            'payment_methods' => [
                (int) $this->paymobIntegrationIds['card']
            ],
            'items' => [
                [
                    'name' => 'Item name',
                    'amount' => 2000,
                    'description' => 'Item description',
                    'quantity' => 1,
                ]
            ],
            'billing_data' => [
                'apartment'     => 'dumy',
                'first_name'    => 'ala',
                'last_name'     => 'zain',
                'street'        => 'dumy',
                'building'      => 'dumy',
                'phone_number'  => '+92345xxxxxxxx',
                'city'          => 'dumy',
                'country'       => 'dumy',
                'email'         => 'ali@gmail.com',
                'floor'         => 'dumy',
                'state'         => 'dumy',
            ],
            'extras' => [
                'ee' => 22
            ],
            'expiration' => 3600,
            'notification_url' => 'https://webhook.site/dabe4968-5xxxxxxxxxxxxxxxxxxxxxx',
            'redirection_url' => 'https://www.base.me/login',
        ];

        $response = $this->requestWithHeaders($url, $data, $headers);
        // dd($response);
        return $response;
    }
}
