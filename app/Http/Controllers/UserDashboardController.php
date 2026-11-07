<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
}
