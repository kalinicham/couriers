<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(4)->letters()->symbols()],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return back();
        }

        return back()->withErrors([
            'error' => 'Invalid credentials.',
        ]);
    }
}
