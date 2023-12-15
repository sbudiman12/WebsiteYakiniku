<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['ayam', 'sapi', 'ikan', 'snack'];

        foreach ($categories as $category) {
            DB::table('kategoris')->insert([
                'kategori_name' => $category,
            ]);
        }
    }
}
