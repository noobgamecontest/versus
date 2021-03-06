<?php

namespace App\Http\Controllers\Front;

use App\Models\Ladder;
use Illuminate\Http\Response;

class LadderController
{
    public function index(): Response
    {
        $ladders = Ladder::all();

        return response()->view('ladder.index', ['ladders' => $ladders]);
    }

    public function ranking(Ladder $ladder): Response
    {
        return response()->view('ladder.ranking', ['ladder' => $ladder]);
    }
}
