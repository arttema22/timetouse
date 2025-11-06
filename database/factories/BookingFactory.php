<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Booking;
use App\Models\Response;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'response_id' => Response::factory(),
            'user_id' => User::factory()->client(),
            'transport_id' => Transport::factory(),
            'start_time' => now()->addDays(5),
            'end_time' => now()->addDays(5)->addHours(4),
            'total_price' => fake()->numberBetween(200, 3000),
            'status' => 'confirmed',
        ];
    }
}
