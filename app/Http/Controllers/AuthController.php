<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Services\Thirdparty\OAuthService;
use Illuminate\Support\Facades\{DB, Auth, Mail};
use App\Http\Requests\Admin\Auth\{ForgetRequest, LoginRequest, RegisterRequest};

class AuthController extends Controller
{
    use UploadTrait;
    private $oAuthService;
    public function __construct(OAuthService $oAuthService)
    {
        $this->oAuthService = $oAuthService;
    }
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
            return redirect()->route('home')->with('success', __('auth.login_success'));
        }
        return redirect()->back()->withErrors(['email' => __('auth.login_failed')]);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $user = User::create($data);
            auth()->login($user);
            DB::commit();
            return redirect()->route('home')->with('success', __('auth.registration_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', __('auth.registration_failed'));
        }
    }
    public function forgetPassword(ForgetRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            $newPass = Str::random(15);
            try {
                DB::beginTransaction();
                $user->password = $newPass;
                $user->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', __('auth.password_reset_failed'));
            }
            Mail::to($user->email)->send(new ResetPasswordMail($user, $newPass));
            return redirect()->back()->with('success', __('auth.password_reset_success'));
        }
        return redirect()->back()->withErrors(['email' => __('auth.email_not_found')]);
    }
    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('login')->with('success', __('auth.logout_success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('auth.logout_failed'));
        }
    }
    public function redirectToProvider($provider)
    {
        $url = $this->oAuthService->getRedirectUrl($provider);
        if ($url) {
            return redirect($url);
        }
        return redirect()->back()->with('error', __('auth.provider_not_supported'));
    }
    public function handleProviderCallback($provider)
    {
        $response = $this->oAuthService->handleProviderCallback($provider);
        if ($response != false) {
            $email = $response['email'] ?? $response['login'] . '@github.com';

            if (User::where('email', $email)->exists()) {
                Auth::loginUsingId(User::where('email', $email)->first()->id);
                return redirect()->route('home')->with('success', __('auth.login_success'));
            }

            $user = User::where('provider_id', $response['id'])->first();
            if (!$user) {
                try {
                    DB::beginTransaction();
                    $user = User::create([
                        'provider_id' => $response['id'],
                        'provider' => $provider,
                        'first_name' => $response['name'],
                        'email' => $email,
                        'password' => Str::random(15),
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
            Auth::login($user);
            return redirect()->route('home')->with('success', __('auth.login_success'));
        }
        return redirect()->back()->with('error', __('auth.login_failed'));
    }
    public function test(Request $request)
    {
        $file = $request->file('file');
        $res = $this->uploadFile($file, 'images');
        return $res;
    }
}
