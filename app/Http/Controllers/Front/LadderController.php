<?php

namespace App\Http\Controllers\Front;

use App\Models\Team;
use App\Models\Ladder;
use Illuminate\Http\Response;

class LadderController
{
    public function index(): Response
    {
        $user = auth()->user();

        return response()->view('ladder.index', ['user' => $user]);
    }

    public function create(): Response
    {
        return response()->view('ladder.create');
    }

    public function ranking(Ladder $ladder, Team $teams): Response
    {
        $teams = Team::all();

        return response()->view('ladder.ranking', ['ladder' => $ladder, 'teams' => $teams]);
    }

    public function edit(Ladder $ladder): Response
    {
        return response()->view('ladder.edit', ['ladder' => $ladder]);
    }
}
