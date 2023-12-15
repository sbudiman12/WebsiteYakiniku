<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ayam = [
            [
                'name' => 'CHICKEN WINGS PIZZA HUT 1kg',
                'description' => 'Chicken wings siap goreng rasanya mirip dengan chicken wing pizza hut.',
                'kategori_id' => 1,
                'price' => 128000,
                'image' => 'ChickenWings.jpg'
            ],

            [
                'name' => 'PAHA SLICE 500gr',
                'description' => 'Paha dan dada ayam dipotong tipis.',
                'kategori_id' => 1,
                'price' => 45000,
                'image' => 'PahaSlice.jpg'
            ],
            [
                'name' => 'DADA SLICE 500gr',
                'description' => 'Paha dan dada ayam dipotong tipis.',
                'kategori_id' => 1,
                'price' => 45000,
                'image' => 'DadaSlice.jpg'
            ],
        ];

        $sapi = [
            [
                'name' => 'SHORTPLATE US PREMIUM (1mm) 500gr',
                'description' => 'Shortplate US Premium tebal 1mm.',
                'kategori_id' => 2,
                'price' => 78000,
                'image' => 'Shortplate.jpg'
            ],
            [
                'name' => 'SHORTPLATE RIB 500gr',
                'description' => 'Shortplate rib cut.',
                'kategori_id' => 2,
                'price' => 75000,
                'image' => 'Shortplate.jpg'
            ],
            [
                'name' => 'SHORTPLATE AUSSIE LOWFAT 500gr',
                'description' => 'Shortplate Aussie Lowfat cut.',
                'kategori_id' => 2,
                'price' => 75000,
                'image' => 'Shortplate.jpg'
            ],
            [
                'name' => 'SAIKORO MELTIQUE (2x2cm) 500gr',
                'description' => 'Saikoro meltique cubes (2x2cm).',
                'kategori_id' => 2,
                'price' => 105000,
                'image' => 'Saikoro2.jpg'
            ],
            [
                'name' => 'WAGYU SLICE (1mm) 500gr',
                'description' => 'Wagyu slice (1mm) and wagyu karubi (3mm).',
                'kategori_id' => 2,
                'price' => 98000,
                'image' => 'WagyuSlice.jpg'
            ],
            [
                'name' => 'WAGYU KARUBI (3mm) 500gr',
                'description' => 'Wagyu slice (1mm) and wagyu karubi (3mm).',
                'kategori_id' => 2,
                'price' => 98000,
                'image' => 'Karubi.jpg'
            ],
            [
                'name' => 'WAGYU MESS CUT 1kg',
                'description' => 'Wagyu mess cut.',
                'kategori_id' => 2,
                'price' => 135000,
                'image' => 'WagyuMess.jpg'
            ],
            [
                'name' => 'WAGYU TOKUSEN 500gr',
                'description' => 'Wagyu dalam bentuk kubus.',
                'kategori_id' => 2,
                'price' => 82000,
                'image' => 'Tokusen.jpg'
            ],
            [
                'name' => 'SANTORI LOWFAT 500gr',
                'description' => 'Santori lowfat cut.',
                'kategori_id' => 2,
                'price' => 75000,
                'image' => 'SantoriLF.jpg'
            ],
            [
                'name' => 'SIRLOIN NONFAT 500gr',
                'description' => 'Sirloin nonfat cut.',
                'kategori_id' => 2,
                'price' => 85000,
                'image' => 'Sirloin.jpg'
            ],

            [
                'name' => 'DAGING GILING AUSSIE BEEF 500gr',
                'description' => 'Daging giling Aussie beef.',
                'kategori_id' => 2,
                'price' => 65000,
                'image' => 'AussieMinced.jpg'
            ],
        ];

        $ikan = [
            [
                'name' => 'SALMON FILLET PREMIUM 200gr',
                'description' => 'Ikan salmon fillet premium.',
                'kategori_id' => 3,
                'price' => 75000,
                'image' => 'Salmon.jpg'
            ],
            [
                'name' => 'TUNA FILLET PREMIUM 500gr',
                'description' => 'Ikan tuna fillet premium frozen.',
                'kategori_id' => 3,
                'price' => 75000,
                'image' => 'Tuna.jpg'
            ],
            [
                'name' => 'DORI FILLET 1kg',
                'description' => 'Ikan dori fillet frozen.',
                'kategori_id' => 3,
                'price' => 50000,
                'image' => 'Dori.jpg'
            ],
        ];

        $snacks = [
            [
                'name' => 'FROZEN HASHBROWN ALA MCD 500gr',
                'description' => 'Frozen hashbrown ala MCD tinggal goreng saja.',
                'kategori_id' => 4,
                'price' => 45000,
                'image' => 'Hashbrown.jpg'
            ],
            [
                'name' => 'SHISAMO IMPORT (TRAY HITAM) 500gr',
                'description' => 'Imported Shisamo (black tray).',
                'kategori_id' => 4,
                'price' => 80000,
                'image' => 'Hashbrown.jpg'
            ],
            [
                'name' => 'SWEET KIMCHI 300gr',
                'description' => 'Kimchi manis cocok dimakan sebagai side dish.',
                'kategori_id' => 4,
                'price' => 40000,
                'image' => 'Kimchi.jpg'
            ],
            [
                'name' => 'YAKINIKU SAUCE SMALL 100ml',
                'description' => 'Saos Yakiniku dalam botol kecil, memiliki rasa yang manis dan gurih cocok uuntuk dipping sauce ataupun marinasi.',
                'kategori_id' => 4,
                'price' => 12000,
                'image' => 'Kimchi.jpg'
            ],
            [
                'name' => 'SHRIMP TOFUROLL 500gr',
                'description' => 'Shrimp Tofuroll frozen.',
                'kategori_id' => 4,
                'price' => 68000,
                'image' => 'TofuRoll.jpg'
            ],
        ];

        $allItems = array_merge($ayam, $sapi, $ikan, $snacks);

        // Insert into database
        foreach ($allItems as $item) {
            DB::table('produks')->insert([
                'nama' => $item['name'],
                'deskripsi' => $item['description'],
                'kategori_id' => $item['kategori_id'], 
                'harga' => $item['price'],
                'gambar' => $item['image'],
                'stok' => 10, 
            ]);
        }

}

}
