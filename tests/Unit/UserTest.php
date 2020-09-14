<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /** @test */
    public function user_is_admin()
    {
        $admin = User::factory()->make([
            'role' => 'admin',
        ]);

        $this->assertTrue($admin->isAdmin());

        $gamer = User::factory()->make([
            'role' => 'gamer',
        ]);

        $this->assertFalse($gamer->isAdmin());
    }
}
