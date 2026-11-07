<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userdata = Auth::user();
        return view('dashboard', compact('userdata'));
    }
    public function userlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function userprofile()
    {
        $userdata = Auth::user();
        return view('dashboard', compact('userdata'));
    }
    public function UserProfileUpdate(Request $request)
    {
        $userdata = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
        ]);

        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->username = $request->username;

        $userdata->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
    }

    public function userUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password Updated Successfully!');
    }
}
