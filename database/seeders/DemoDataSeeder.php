<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use App\Models\Request;
use App\Models\Response;
use App\Models\Transport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            // 10 клиентов
            $clients = User::factory(10)->client()->create();
            // 5 владельцев
            $owners = User::factory(5)->owner()->create();
            // 20 транспортов (по 4 на владельца)
            Transport::factory(20)->create();
            // 30 запросов от клиентов
            $requests = Request::factory(30)->create();
            // 60 откликов (по ~2 на запрос)
            Response::factory(60)->create();
            // 30 бронирований
            Booking::factory(30)->create();
        }
    }
}
