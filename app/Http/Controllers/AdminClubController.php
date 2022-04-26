<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class AdminClubController extends Controller
{
    public function create()
    {
        return view('club.create');
    }

    public function store()
    {
        $attributes = array_merge($this->validateClub(), [
            'owner' => auth()->id(),
        ]);

        if (!($attributes)) {
            throw ValidationException::withMessages([
                'name' => "Your club name could not be verified",
                'slug' => "Your club's slug could not be verified",
            ]);
        }

        $club = Club::create($attributes);
        auth()->user()->clubs()->attach($club);

        return redirect('/club/' . $club->slug);
    }

    public function edit(Club $club)
    {
        return view('club.edit', [
            'club' => $club,
        ]);
    }

    public function update(Club $club)
    {
        $attributes = $this->validateClub($club);

        $club->update($attributes);

        return redirect('/club/' . $club->slug);
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return view('homepage');
    }

    protected function validateClub(?Club $club = null): array
    {
        $club ??= new Club();
        return request()->validate([
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'max:255', Rule::unique('clubs', 'slug')->ignore($club->id)],
        ]);
    }
}