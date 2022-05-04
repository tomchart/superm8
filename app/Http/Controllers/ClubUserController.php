<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;

class ClubUserController extends Controller
{
    public function destroy(User $user, Club $club)
    {
        $club->users()->detach($user->id);
        return back()->with('success', $user->username . ' removed from ' . $club->name);
    }
}
