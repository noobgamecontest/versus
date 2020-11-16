<?php

namespace App\Http\Controllers\Front;

use App\Models\Team;
use App\Models\Ladder;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Expr\Cast\Int_;

class LadderController
{
    public function index(): Response
    {
        $ladders = Ladder::all();

        return response()->view('ladder.index', ['ladders' => $ladders]);
    }

    public function create()
    {
        return view('ladder.create');
    }

    public function show(Ladder $ladder)
    {
        dd($ladder);
    }

    public function teams()
    {
        return response()->view('ladder.teams', ['teams' => $teams]);
    }

    public function ranking(Ladder $ladder, Team $teams): Response
    {
        $teams = Team::all();

        return response()->view('ladder.ranking', ['ladder' => $ladder, 'teams' => $teams]);
    }

    public function edit(Ladder $ladder)
    {
        return response()->view('ladder.edit', ['ladder' => $ladder]);
    }
}
