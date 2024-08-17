<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCoontroller extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {

        $request->validate([
            "email" => "required",
            "password" => "required"

        ]);

        $validate = auth()->attempt([
            "email" => $request->email,
            "password" => $request->password,
            "is_admin" => 1,
        ]);

        if ($validate) {
            return redirect()->route('admin.dashboard')->withMessage("logged in successfully");
        } else {
            return redirect()->back()->with("error", "invalid credentials");
        }
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with("message", "Admin Logout has been Successfully");
    }
}
