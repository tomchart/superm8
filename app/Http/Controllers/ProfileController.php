<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use App\Models\User;
use App\Models\Rating;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'mediaTypes' => MediaType::all(),
            'ratings' => Rating::all(),
        ]);
    }
}
