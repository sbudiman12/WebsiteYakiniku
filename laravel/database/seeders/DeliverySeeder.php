<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Delivery::create(['delivery_name' => 'Pickup']);
        Delivery::create(['delivery_name' => 'Kurir']);
    }
}
