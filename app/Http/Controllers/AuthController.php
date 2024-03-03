<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return "Invalid credentials. Check the email address and password entered";
        }

        return redirect('/dashboard')->with('success', 'Login successful');
    }
}
