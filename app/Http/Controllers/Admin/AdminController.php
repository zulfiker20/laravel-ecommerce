<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = Auth::user();
        return view('admin.profile.index', compact('adminData'));
    }

    public function ProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $adminData = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $adminData->name = $request->name;
        $adminData->email = $request->email;
        $adminData->username = $request->username;
        $adminData->phone = $request->phone;
        $adminData->address = $request->address;

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $filename);

            // Delete old image
            if (
                $adminData->photo &&
                file_exists(public_path('upload/admin_images/' . $adminData->photo))
            ) {

                unlink(public_path('upload/admin_images/' . $adminData->photo));
            }

            $adminData->photo = $filename;
        }

        $adminData->save();

        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function ChangePassword()
    {
        return view('admin.profile.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");
    } // End Mehtod 


}
