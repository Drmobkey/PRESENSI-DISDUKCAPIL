<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logbook>
 */
class LogbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingUser = User::inRandomOrder()->first();

        return [
            //
            'user_id' => $existingUser->no_id,
            'description' => $this->faker->sentence(),
            'image' => $this->faker->image('public/logbook', 320, 240, null, false),
        ];
    }
}
