<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Plan;
use App\Models\Server;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create one admin user
        // User::factory()->admin()->create();

        // Create one regular user
        // User::factory()->user()->create();

        // Order::factory(2)->create();

        OrderItem::factory(1)->create();
    }
}
