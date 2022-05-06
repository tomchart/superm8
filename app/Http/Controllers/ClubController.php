<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\MediaType;
use App\Models\Rating;

class ClubController extends Controller
{
    public function show(Club $club)
    {
        return view('club.show', [
            'club' => $club,
            'mediaTypes' => MediaType::all(),
            'ratings' => Rating::all(),
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
