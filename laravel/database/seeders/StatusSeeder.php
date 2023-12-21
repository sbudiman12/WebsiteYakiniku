<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['status_name' => 'Berhasil']);
        Status::create(['status_name' => 'Menunggu Verifikasi']);
        Status::create(['status_name' => 'Gagal']);
    }
}
