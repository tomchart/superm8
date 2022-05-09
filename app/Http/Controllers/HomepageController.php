<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function show()
    {
        return view('homepage', [
            'user' => auth()->user(),
            'clubs' => auth()->user()->clubs,
        ]);
    }
}
