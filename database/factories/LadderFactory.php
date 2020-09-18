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
            'name' => $this->faker->randomElement(['1v1 Ping-Pong', '2v2 Ping-Pong', '1v1 Street Fighter', '1v1 Shifumi', '1v1 Mario Kart', 'FFA Mario Kart']),
            'description' => $this->faker->text(42),
        ];
    }
}
