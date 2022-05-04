<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'mediaTypes' => MediaType::all(),
        ]);
    }
}
