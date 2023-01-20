<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monthly>
 */
class MonthlyFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'description' => $this->faker->text(),
            'tags' => $this->faker->word(),
            'paid_by' => $this->faker->word(),
            'price' => $this->faker->randomNumber(2),
            'same_price' => false, //$this->faker->boolean(),
            'last_inserted_date' => now(),
            'start_date' => now()->subYear(),
            'end_date' => null
        ];
    }
}
