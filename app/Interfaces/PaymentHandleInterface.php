<?php
namespace App\Interfaces;
interface PaymentHandleInterface
{
    public function createPayment($data);
    // public function handleProviderCallback($provider);
}
