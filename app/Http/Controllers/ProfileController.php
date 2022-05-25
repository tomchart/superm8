<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Validation\Rule;

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

    public function update()
    {
        $path = null;
        if (request()->file('avatar')) {
            $path = request()->file('avatar')->store('avatars');
        }
        $user = auth()->user();
        $attributes = request()->validate([
            'name' => ['min:3', 'max:255'],
            'username' => ['min:3', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
            'description' => ['min:0', 'max:255'],
            'avatar' => ['image'],
        ]);
        // need to throw something here if user inputs bad data
        // atm just return regardless
        foreach ($attributes as $key => $value) {
            $user->$key = $value;
        };
        if ($path) {
            $user->avatar = $path;
        }
        $user->save();
        return redirect('/profile/' . $attributes['username'])->with('success', 'Account edited.');
    }
}
