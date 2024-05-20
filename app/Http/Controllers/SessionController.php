<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $att = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (!Auth::attempt($att)) {
            throw ValidationException::withMessages(['email' => 'Email or Password does not match']);
        }

        request()->session()->regenerate();

        return redirect('/jobs');

    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }


}
