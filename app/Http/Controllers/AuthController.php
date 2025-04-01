<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\{DB, Auth, Mail};
use App\Http\Requests\Admin\Auth\{ForgetRequest, LoginRequest, RegisterRequest};

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
            return redirect()->route('index')->with('success', 'Login successful!');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $user = User::create($data);
            auth()->login($user);
            DB::commit();
            return redirect()->route('index')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }
    public function resetPassword(ForgetRequest $request)
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
                return redirect()->back()->with('error', 'Failed to reset password. Please try again.');
            }
            Mail::to($user->email)->send(new ResetPasswordMail($user, $newPass));
            return redirect()->back()->with('success', 'New password has been sent to your email.');
        }
        return redirect()->back()->with('error', 'Email not found.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
