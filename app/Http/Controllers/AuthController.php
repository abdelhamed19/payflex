<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->route('index')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new user
        $user = \App\Models\User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        auth()->login($user);

        return redirect()->route('index')->with('success', 'Registration successful!');
    }
    public function resetPassword(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $newPass = Str::random(12);
            $user->password = Hash::make($newPass);
            $user->save();
            Mail::to($user->email)->send(new ResetPasswordMail($user,$newPass));
            return redirect()->back()->with('success', 'New password has been sent to your email.');
        }
        return redirect()->back()->with('error','Email not found.');
    }
}
