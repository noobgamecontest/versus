<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\UpdateTeamFormRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function index(): JsonResponse
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    public function store(Request $request)
    {
        $team = Team::create($request->only(['name', 'description']));

        return response()->json($team);
    }

    public function update(Team $team, UpdateTeamFormRequest $request)
    {
        $team->update($request->only('name', 'description'));

        return Redirect::route('teams.index');
    }
}
