<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (empty(Auth::user())) {
            return redirect(route('auth.login_form'));
        }

        return view('dashboard');
    }
}
