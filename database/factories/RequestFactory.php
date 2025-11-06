<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition()
    {
        $start = now()->addDays(rand(1, 30));
        $end = $start->copy()->addHours(rand(2, 24));

        return [
            'user_id' => User::factory()->client(),
            'location' => fake()->city(),
            'start_time' => $start,
            'end_time' => $end,
            'status' => 'pending',
        ];
    }
}
