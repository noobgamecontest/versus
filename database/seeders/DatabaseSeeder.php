<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Match;
use App\Models\Ladder;
use App\Services\EloService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $ladder = Ladder::factory()->create([
            'name' => '1v1 Pong',
        ]);

        User::factory()->create()->each(function (User $user) use ($ladder) {
            $user->teams()->save(Team::factory()->make([
                'name' => $user->name,
                'avatar' => $user->avatar,
                'ladder_id' => $ladder->id,
            ]));
        });

        $teams = Team::all()->random(12);

        for ($i = 0; $i < 3; $i++) {
            $teams->each(function ($team) use ($teams) {
                $opponents = $teams->where('id', '!=', $team->id)->random(5);

                $opponents->each(function ($opponent) use ($team) {
                    $match = Match::create([
                        'processed_at' => now(),
                    ]);

                    $teamScore = 11;
                    $opponentScore = rand(0, 9);

                    $match->teams()->save($team, ['score' => $teamScore]);
                    $match->teams()->save($opponent, ['score' => $opponentScore]);

                    $this->container->get(EloService::class)->calculateAfterMatch($match);
                });
            });
        }
    }
}
