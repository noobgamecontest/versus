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
        $user = auth()->user();

        return response()->view('ladder.index', ['user' => $user]);
    }


    public function create()
    {
        return view('ladder.create');
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
