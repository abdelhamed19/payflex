<?php
namespace App\Services;
use App\Interfaces\BuildRequestInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class BuildRequestClass implements BuildRequestInterface
{
    public function requestWithHeaders($url, $data, $headers = [], $method = 'POST')
    {
        try {
            $response = Http::withHeaders($headers)->$method($url, $data);
            if ($response->successful()) {
                return $response->json();
            } else {
                dd($response->body());
                Log::error('Request failed', [
                    'url' => $url,
                    'data' => $data,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Request error', [
                'url' => $url,
                'data' => $data,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }
    public function requestWithToken($url, $data, $token = null, $method = 'POST', $headers = [])
    {
        try {
            $response = Http::withToken($token)->$method($url, $data);
            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Request failed', [
                    'url' => $url,
                    'data' => $data,
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Request error', [
                'url' => $url,
                'data' => $data,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }
}
