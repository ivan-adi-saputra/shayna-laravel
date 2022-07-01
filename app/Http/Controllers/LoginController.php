<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->all();
        $credentials = $request->except('_token');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->with('error', 'email atau password yang anda masukkan salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
