<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Validation\ValidationException;

class AdminClubController extends Controller
{
    public function create()
    {
        return view('club.create');
    }

    public function store()
    {
        $slug = $this->createSlug(request('name'));

        $attributes = array_merge($this->validateClub(), [
            'owner' => auth()->id(),
        ]);

        $attributes = array_merge($attributes, [
            'slug' => $slug,
        ]);

        if (!($attributes)) {
            throw validationexception::withmessages([
                'name' => "your club name could not be verified",
            ]);
        }

        $club = club::create($attributes);
        auth()->user()->clubs()->attach($club);

        return redirect('/club/' . $club->slug);
    }

    public function edit(club $club)
    {
        return view('club.edit', [
            'club' => $club,
        ]);
    }

    public function update(club $club)
    {
        $attributes = $this->validateclub($club);

        $club->update($attributes);

        return redirect('/club/' . $club->slug);
    }

    public function destroy(club $club)
    {
        $club->delete();
        return back()->with('success', 'Club deleted successfully');
    }

    protected function createSlug(string $club_name)
    {
        $slug = str_replace([' '], ['-'], strtolower($club_name));
        if (Club::where('slug', '=', $slug)->count() > 0) {
            throw ValidationException::withMessages([
                'club' => 'Your club slug is already in use (does a club with this name already exist?)',
            ]);
        }
        return $slug;
    }

    protected function validateClub(?club $club = null): array
    {
        $club ??= new Club();
        return request()->validate([
            'name' => ['required', 'max:255'],
        ]);
    }
}
