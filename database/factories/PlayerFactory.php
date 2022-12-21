<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>fake()->name(),
        'lastname' =>fake()->lastname(),
        'age' => fake()->numberBetween(5,80),
        'score' =>fake()->randomFloat(1,0,5),
        'nationality' =>fake()->country(),
        'team_id' =>(Team::all()->random())->id,
        ];
    }
}
