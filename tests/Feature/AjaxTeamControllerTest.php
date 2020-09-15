<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Team;
use App\Models\Ladder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AjaxTeamControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_have_teams_by_ladder()
    {
        $ladder = Ladder::factory()->create();

        $ladder->teams()->saveMany(
            $teams = Team::factory()->count(2)->make()
        );

        $response = $this->get('/ajax/ladders/' . $ladder->id . '/teams');

        $response->assertSuccessful();

        $response->assertJsonCount(2);
        $response->assertJsonFragment(['name' => $teams[0]->name]);
        $response->assertJsonFragment(['name' => $teams[1]->name]);
    }
}
