<?php
namespace App\Interfaces;
interface BuildRequestInterface
{
    public function requestWithHeaders($url, $data, $headers = [], $method = 'POST');
    public function requestWithToken($url, $data, $token = null, $method = 'POST', $headers = []);
}
