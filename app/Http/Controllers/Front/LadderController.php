<?php

namespace App\Http\Controllers\Front;

use App\Models\Ladder;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LadderController
{
    public function index(): Response
    {
        $ladders = Ladder::all();

        return response()->view('ladder.index', ['ladders' => $ladders]);
    }

    public function show(Ladder $ladder): Response
    {
        return response()->view('ladder.show', ['ladder' => $ladder]);
    }
    public function create(): Response
    {
        return response()->view('ladder.create');
    }

    public function edit(Ladder $ladder): Response
    {
        return response()->view('ladder.edit', ['ladder' => $ladder]);
    }

    public function ranking(Ladder $ladder): Response
    {
        return response()->view('ladder.ranking', ['ladder' => $ladder]);
    }
}
