<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    public function show(Club $club)
    {
        return view('club', [
            'club' => $club,
        ]);
    }
}
