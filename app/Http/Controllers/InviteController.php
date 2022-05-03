<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Invite;
use Illuminate\Validation\Rule;
use Nette\Utils\Random;

class InviteController extends Controller
{
    public function store(Club $club)
    {
        $attributes = array_merge($this->createCode(), [
            'club_id' => $club->id,
        ]);
        $invite = Invite::create($attributes);
        return back()->with('invite', $invite);
    }

    public function show()
    {
        return view('club.redeem');
    }

    public function put(Request $request)
    {
        $request->validate([
            'invite_code' => Rule::exists('invites', 'code'),
        ]);
        $invite = Invite::where('code', $request->invite_code)->first();
        // this method does exist, ignore lsp error
        auth()->user()->clubs()->attach($invite->club);

        $invite->accepted = true;
        $invite->save();

        return back()->with('success', 'Welcome to ' . $invite->club->name . '!');
    }

    protected function createCode()
    {
        $code = Random::generate(15);
        while (Invite::where('code', '=', $code)->exists()) {
            $code = Random::generate(15);
        }
        return ['code' => $code];
    }
}
