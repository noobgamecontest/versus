<?php

namespace Database\Factories;

use App\Models\Ladder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LadderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ladder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => '1v1 ' . $this->faker->randomElement(['Ping-Pong', 'Street Fighter', 'Shifumi', 'Mario Kart']),
        ];
    }
}
