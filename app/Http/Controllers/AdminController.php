<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('RegisterLogin.main');
    }
    public function showLoginForm()
    {
        return view('RegisterLogin.login');
    }

    public function showRegisterForm()
    {
        return view('RegisterLogin.register');
    }

    public function register(Request $request) {
        $validateData = $request->validate(([
            'name' => 'required|max:255|unique:admins',
            'password' => 'required|min:8'
        ]));

        $validateData['password'] = bcrypt($validateData['password']);

        $admin = admin::create($validateData);

        // Log in the admin
        Auth::login($admin);
        return redirect()->intended('/home');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else {
            return redirect()->route('login')->with('error', 'Login Failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
