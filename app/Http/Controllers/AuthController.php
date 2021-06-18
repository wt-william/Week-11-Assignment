<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $userData = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        if (Auth::attempt($userData)) {
            return redirect(route('home'));
        }

        return back();
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $input = $request->all();
        if (
            empty($request->get('email')) || 
            empty($request->get('password')) || 
            empty($request->get('repeat_password')) 
        ) {
            return back()->withInput($input);
        }

        if ($request->get('password') !== $request->get('repeat_password')) {
            return back()->withInput($input);
        }

        $input['password'] = Hash::make($input['password']);
        User::create($input);
        $request->session()->flush();

        return redirect(route('auth.login_form'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('auth.login_form'));
    }
}
