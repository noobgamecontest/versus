<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Team;
use App\Models\Ladder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AjaxMatchControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_store_match()
    {
        $ladder = Ladder::factory()->create();

        $ladder->teams()->saveMany(
            $teams = Team::factory()->count(2)->make()
        );

        $response = $this->post('/ajax/ladders/' . $ladder->id . '/matches', [
            'home_id' => $teams->first()->id,
            'away_id' => $teams->last()->id,
            'home_score' => 3,
            'away_score' => 0,
        ]);

        $this->assertDatabaseCount('matches', 1);
        $this->assertDatabaseHas('match_team', [
            'team_id' => $teams->first()->id,
            'score' => 3,
            'won' => true,
        ]);
        $this->assertDatabaseHas('match_team', [
            'team_id' => $teams->last()->id,
            'score' => 0,
            'won' => false,
        ]);

        $response->assertSuccessful();
    }
}
