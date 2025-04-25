<?php

namespace App\Http\Controllers\Api\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private static $paymentGateways = [
        'paymob' => 'App\Services\Payments\PaymobService',
        'fawry' => 'App\Services\Payments\FawryService',
        'paypal' => 'App\Services\Payments\PayPalService',
    ];
    public function createPayment(Request $request)
    {
        $gateway = $request->gateway;
        if (!array_key_exists($gateway, self::$paymentGateways)) {
            return response()->json(['error' => 'Invalid payment gateway'], 400);
        }
        $service = new self::$paymentGateways[$gateway];
        $link = $service->createPayment();
        if ($link) {
            return response()->json(['response' => $link], 200);
        } else {
            return response()->json(['error' => 'Failed to create payment link'], 500);
        }
    }
}
