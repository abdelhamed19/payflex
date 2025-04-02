<?php
namespace App\Services\Thirdparty;

use Illuminate\Support\Facades\Http;

class OAuthService
{
    public function getRedirectUrl($provider)
    {
        $configs = config('thirdparty.oauth.' .$provider);
        $redirectUrl = '';
        if (!$provider) {
            return false;
        }
        $redirectUrl = $configs['request_url'] . '?client_id=' . $configs['client_id'] . '&redirect_uri=' . $configs['redirect'] . '&response_type=code&scope=' . $configs['scope'];
        return $redirectUrl;
    }
    public function handleProviderCallback($provider)
    {
        $code = request()->get('code');
        $configs = config('thirdparty.oauth.' .$provider);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->asForm()->post($configs['access_token_url'], [
            'client_id' => $configs['client_id'],
            'client_secret' => $configs['client_secret'],
            'redirect_uri' => $configs['redirect'],
            'code' => $code,
            'grant_type' => 'authorization_code',
            'access_type' => 'offline',
            'prompt' => 'consent',
        ])->json();
        if (!isset($response['access_token'])) {
            return false;
        }
        $user = Http::withToken($response['access_token'])->get($configs['user_info_url']);
        $userData = $user->json();
        if (isset($userData['id'])) {
            return $userData;
        }
        return false;
    }
}
