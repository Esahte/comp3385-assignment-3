<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('login');
    }

    public function store(AuthRequest $request): RedirectResponse
    {
        $request->validated();

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect('/login')->with('error',"Invalid credentials. Check the email address and password entered");
        }

        return redirect('/dashboard')->with('success', 'Login successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successful');
    }
}
