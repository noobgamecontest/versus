<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\StoreTeamFormRequest;
use App\Http\Requests\UpdateTeamFormRequest;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Psy\Util\Json;

class TeamController extends Controller
{
    public function index(): JsonResponse
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    public function store(Team $team,StoreTeamFormRequest $request): JsonResponse
    {
        $team->create($request->only('name', 'description', 'image_url'));

        return response()->json($request);
    }

    public function update(Team $team, UpdateTeamFormRequest $request): JsonResponse
    {
        $team->update($request->only('name', 'description'));

        return response()->json($team);
    }
}
