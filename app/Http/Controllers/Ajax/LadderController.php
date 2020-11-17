<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\StoreLadderFormRequest;
use App\Models\Ladder;
use App\Http\Requests\UpdateLadderFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LadderController extends Controller
{
    public function index(): JsonResponse
    {
        $ladders = Ladder::all();

        return response()->json($ladders);
    }

    public function ranking(Request $request, Ladder $ladder): JsonResponse
    {
        $teams = $ladder->teams()->whereNotNull('level')->orderBy('elo', 'desc')->get();

        $currentUserTeamId = null;

        if ($user = $request->user()) {
            $currentUserTeamId = optional($user->teams()->where('ladder_id', $ladder->id)->first())->id;
        }

        $rank = 1;

        $teams->each(function ($team) use (&$rank, $currentUserTeamId) {
            $team->rank = $rank++;
            $team->current = $team->id === $currentUserTeamId;
        });

        return response()->json($teams);
    }

    public function store(Ladder $ladder, StoreLadderFormRequest $request): JsonResponse
    {
        $ladder->create($request->only('name', 'description', 'image_url'));

        return response()->json($request);
    }

    public function update(Ladder $ladder, UpdateLadderFormRequest $request): JsonResponse
    {
        $ladder->update($request->only('name', 'description', 'image_url'));

        return response()->json($ladder);
    }

    public function destroy(Ladder $ladder): JsonResponse
    {
        $ladder->delete();

        return response()->json($ladder);
    }
}
