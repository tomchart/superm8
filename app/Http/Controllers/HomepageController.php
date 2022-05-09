<?php

namespace App\Http\Controllers;

use Exception;

class HomepageController extends Controller
{
    public function show()
    {
        $user = null;
        $clubs = null;
        try {
            $user = auth()->user();
            $clubs = $user->clubs;
        } catch (Exception $e) {
            //
        }
        return view('homepage', [
            'user' => $user,
            'clubs' => $clubs,
        ]);
    }
}
