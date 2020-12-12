<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\StoreLadderFormRequest;
use App\Http\Requests\UpdateLadderFormRequest;
use App\Models\Ladder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LadderController extends Controller
{
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

    public function store(Ladder $ladder, StoreLadderFormRequest $request): RedirectResponse
    {
        $ladder->create($request->only('name', 'description'));

        return redirect()->route('ladder.index');
    }

    public function update(UpdateLadderFormRequest $request, Ladder $ladder): RedirectResponse
    {
        $ladder->update($request->only('name', 'description'));

        return redirect()->route('ladder.index');
    }

    public function destroy(Ladder $ladder): RedirectResponse
    {
        $ladder->delete();

        return redirect()->route('ladder.index');
    }
}
