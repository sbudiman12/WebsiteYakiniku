<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Transaksi_Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $transaksis = Transaksi::all();

        foreach($transaksis as $transaksi) {
            
            $produk = Produk::find(fake()->numberBetween(1, 22));

            Transaksi_Produk::create([

            'product_id' => $produk['id'],
            'transaksi_id' => $transaksi['id'],
            'harga' => $produk['harga'], // Assuming Produk has 10 records
            'jumlah' => fake()->numberBetween(1, 2)

            ]);
        }

        foreach($transaksis as $transaksi) {
            
            $produk = Produk::find(fake()->numberBetween(1, 22));

            Transaksi_Produk::create([

            'product_id' => $produk['id'],
            'transaksi_id' => $transaksi['id'],
            'harga' => $produk['harga'], // Assuming Produk has 10 records
            'jumlah' => fake()->numberBetween(1, 2)

            ]);
        }


        
        
    }
}
