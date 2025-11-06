<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    protected $model = Transport::class;

    public function definition()
    {
        return [
            'owner_id' => User::factory()->owner(),
            'name' => fake()->words(3, true),
            'type' => fake()->randomElement(['boat', 'yacht', 'atv', 'snowmobile', 'scooter']),
            'description' => fake()->sentence(),
            'price_per_hour' => fake()->numberBetween(50, 300),
            'price_per_day' => fake()->numberBetween(300, 2000),
            'location' => fake()->city(),
            'is_active' => true,
        ];
    }
}
