<?php

namespace App\Http\Controllers\Front;

use App\Models\Ladder;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function create(Ladder $ladder)
    {
        return response()->view('team.create', ['ladder' => $ladder]);
    }
}
