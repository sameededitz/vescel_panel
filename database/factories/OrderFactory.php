<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '2',
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'total_price' => fake()->randomFloat(2, 100, 1000),
            'comments' => fake()->text(20)
        ];
    }
}
