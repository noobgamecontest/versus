<?php

namespace App\Http\Controllers\Front;

use App\Models\Ladder;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    public function index(Ladder $ladder): Response
    {
        return response()->view('teams.index', ['ladder' => $ladder]);
    }

    public function create()
    {
        return view('teams.create');
    }
}
