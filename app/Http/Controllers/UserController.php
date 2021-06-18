<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //dd('User index');
        $users = User::all();
        //dd($users);
        return view('users', compact("users"));
    }

    public function create()
    {
        dd('User create');
    }

    public function store(Request $request)
    {
        dd('User store');
    }

    public function edit(User $user)
    {
        dd($user->email);
    }

    public function update(User $user, Request $request)
    {
        dd($user->email);
    }

    public function destroy(User $user)
    {
        dd($user->email);
    }
}
