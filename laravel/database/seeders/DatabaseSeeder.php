<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;

use Database\Factories\ProdukFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        $this->call([StatusSeeder::class]);
        $this->call([DeliverySeeder::class]);
        $this->call([UserSeeder::class]);
        User::factory()->count(3)->create();
        //Kategori::factory()->count(5)->create();
        //Produk::factory()->count(50)->create();
        $this->call([KategoriSeeder::class]);
        $this->call([ProdukSeeder::class]);

        
        Transaksi::factory()->count(15)->create();

        $this->call([TransaksiProdukSeeder::class]);

    }

    
}
