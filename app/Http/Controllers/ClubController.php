<?php

namespace App\Http\Controllers;

use App\Jobs\ClubProgress;
use App\Models\Club;
use App\Models\MediaType;
use App\Models\Rating;

class ClubController extends Controller
{
    public function show(Club $club)
    {
        // no shot this scales
        $progress = ClubProgress::dispatchNow($club);
        return view('club.show', [
            'club' => $club,
            'mediaTypes' => MediaType::all(),
            'ratings' => Rating::all(),
            'progress' => $progress,
            'comments' => $club->comments()->orderBy('created_at', 'DESC')->paginate(5),
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
