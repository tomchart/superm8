<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public static function create()
    {
        return view('session.create');
    }

    public static function store()
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Your credentials could not be verified',
            ]);
        }
        return redirect('/');
    }

    public static function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
