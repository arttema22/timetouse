<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Request;
use App\Models\Response;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    protected $model = Response::class;

    public function definition()
    {
        return [
            'request_id' => Request::factory(),
            'transport_id' => Transport::factory(),
            'owner_id' => User::factory()->owner(),
            'price_offered' => fake()->numberBetween(100, 2500),
            'message' => fake()->optional()->sentence(),
            'status' => 'pending',
        ];
    }
}
