<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('user_name', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            // Redirect to the intended page or the dashboard
            return redirect()->intended('/dashboard')->with('success', 'You have successfully logged in');
        }

        // Authentication failed
        return redirect()->back()->with('error-msg', 'Oops! You have entered invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
