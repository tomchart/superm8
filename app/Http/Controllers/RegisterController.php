<?php

namespace App\Http\Controllers;


class RegisterController extends Controller
{
    public static function create()
    {
        return view('register.create');
    }

    public static function store()
    {
        ddd(request()->all());
    }
}
