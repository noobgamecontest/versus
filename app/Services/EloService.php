<?php

namespace App\Services;

use App\Models\Match;
use App\Models\Team;

class EloService
{
    /**
     * @var LevelService
     */
    protected $levelService;

    /**
     * EloService constructor.
     *
     * @param LevelService $levelService
     */
    public function __construct(LevelService $levelService)
    {
        $this->levelService = $levelService;
    }

    /**
     * @param \App\Models\Match $match
     * @throws \Exception
     */
    public function calculateAfterMatch(Match $match)
    {
        $match->teams->each(function (Team $team) use ($match) {
            $opponent =  $match->teams->where('id', '!=', $team->id)->first();

            $teamLevel = $this->levelService->getLevelByElo($team->elo);

            $result = null;

            switch (true) {
                case ($team->pivot->score === $opponent->pivot->score):
                    $result = 0.5;
                    break;
                case ($team->pivot->score > $opponent->pivot->score):
                    $result = 1;
                    break;
                case ($team->pivot->score < $opponent->pivot->score):
                    $result = 0;
                    break;
            }

            $eloDiff = $this->calculateDiff($teamLevel, $team->elo, $opponent->elo, $result);

            $match->teams()->updateExistingPivot($team, [
                'elo_diff' => $eloDiff,
                'won' => $result === 1,
            ]);
        });

        $match->teams()->each(function (Team $team) use ($match) {
            $newElo = $team->elo + $team->pivot->elo_diff;
            $newLevel = $this->levelService->getLevelByElo($newElo);

            $team->update([
                'elo' => $newElo,
                'level' => $newLevel->name,
            ]);
        });
    }

    /**
     * Calcule l'elo du joueur en fonction de celui de son adversaire et du vainqueur du match
     *
     * @param Level $teamLevel
     * @param int $teamElo
     * @param int $opponentElo
     * @param float $result
     * @return int
     */
    protected function calculateDiff(Level $teamLevel, int $teamElo, int $opponentElo, float $result): int
    {
        $playerChance = $this->estimateChance($teamElo, $opponentElo);

        return round($teamLevel->speed * ($result - $playerChance));
    }

    /**
     * Détermine le pourcentage de change de gagner du joueur par rapport à son adversaire.
     *
     * @param int $teamElo
     * @param int $opponentElo
     * @return float
     */
    protected function estimateChance(int $teamElo, int $opponentElo): float
    {
        $exp = ($opponentElo - $teamElo) / 400;

        return 1 / (1 + pow(10, $exp));
    }
}
