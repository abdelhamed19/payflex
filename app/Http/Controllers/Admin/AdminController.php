<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.home.profile', compact('user'));
    }
    public function updateProfile(UpdateProfile $request)
    {
        $user = User::findOrFail(Auth::id());
        $data = $request->validated();
        $user->update($data);
        return redirect()->back()->with('success', __('admin.profile_updated_successfully'));
    }
}
