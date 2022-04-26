<?php

namespace App\Http\Controllers;

use App\Models\Club;

class ClubController extends Controller
{
    public function show(Club $club)
    {
        return view('club.show', [
            'club' => $club,
        ]);
    }

    public function index()
    {
        $clubs = auth()->user()->clubs;
        return view('club.index', [
            'clubs' => $clubs,
        ]);
    }
}
