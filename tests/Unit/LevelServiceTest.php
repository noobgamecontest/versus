<?php

namespace Tests\Unit;

use Exception;
use Tests\TestCase;
use App\Services\LevelService;

class LevelServiceTest extends TestCase
{
    /** @test */
    public function get_level_by_elo(): void
    {
        $levelService = new LevelService($this->app->get('config'));

        $level = $levelService->getLevelByElo(0);
        $this->assertEquals(120, $level->speed);
        $this->assertEquals('iron', $level->name);

        $level = $levelService->getLevelByElo(499);
        $this->assertEquals(120, $level->speed);
        $this->assertEquals('iron', $level->name);

        $level = $levelService->getLevelByElo(500);
        $this->assertEquals(100, $level->speed);
        $this->assertEquals('bronze', $level->name);

        $level = $levelService->getLevelByElo(999);
        $this->assertEquals(100, $level->speed);
        $this->assertEquals('bronze', $level->name);

        $level = $levelService->getLevelByElo(1000);
        $this->assertEquals(80, $level->speed);
        $this->assertEquals('silver', $level->name);

        $level = $levelService->getLevelByElo(1499);
        $this->assertEquals(80, $level->speed);
        $this->assertEquals('silver', $level->name);

        $level = $levelService->getLevelByElo(1500);
        $this->assertEquals(50, $level->speed);
        $this->assertEquals('gold', $level->name);

        $level = $levelService->getLevelByElo(1999);
        $this->assertEquals(50, $level->speed);
        $this->assertEquals('gold', $level->name);

        $level = $levelService->getLevelByElo(2000);
        $this->assertEquals(30, $level->speed);
        $this->assertEquals('platinum', $level->name);

        $level = $levelService->getLevelByElo(2499);
        $this->assertEquals(30, $level->speed);
        $this->assertEquals('platinum', $level->name);

        $level = $levelService->getLevelByElo(2500);
        $this->assertEquals(20, $level->speed);
        $this->assertEquals('diamond', $level->name);
    }

    /** @test */
    public function can_not_get_unknown_level(): void
    {
        $levelService = new LevelService($this->app->get('config'));

        $this->expectException(Exception::class);

        $levelService->getLevelByElo(-420);
    }

    /** @test */
    public function can_have_the_next_level(): void
    {
        $levelService = new LevelService($this->app->get('config'));

        $level = $levelService->getLevelByElo(1000);
        $this->assertEquals('silver', $level->name);

        $nextLevel = $levelService->getNextLevel($level);
        $this->assertEquals('gold', $nextLevel->name);
    }
}
