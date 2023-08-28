<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginControler extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        if (! Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('error', 'The email and password do not match');
        }

        return redirect()->route('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
