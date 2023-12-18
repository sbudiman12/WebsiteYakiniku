<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => \Faker\Factory::create()->name(),
            'email' => \Faker\Factory::create()->unique()->safeEmail(),
            'phone_number' => \Faker\Factory::create()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => bcrypt('wasdwasd'),
            'role_id' => '2',
            'is_login' => '0',
            'is_active' => '1',
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => \Faker\Factory::create()->name(),
            'email' => 'sbudiman@student.ciputra.ac.id',
            'phone_number' => \Faker\Factory::create()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => bcrypt('sbudiman'),
            'role_id' => '1',
            'is_login' => '0',
            'is_active' => '1',
            'remember_token' => Str::random(10),
        ]);


    }
}
