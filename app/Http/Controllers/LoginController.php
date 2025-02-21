<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('backend.pages.auth.login');
    }

    public function DashboardPage()
    {
        return view('backend.pages.dashboard');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'=>'email|required',
            'password'=>'required|string|min:4'
        ]);

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        // if login attempt successful, the redirect to dashboard
        if(Auth::attempt($credentials, $request->filled('remember')))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // return error message
        return back()->withErrors([
            'email'=>'Wrong Credentials Found!'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
