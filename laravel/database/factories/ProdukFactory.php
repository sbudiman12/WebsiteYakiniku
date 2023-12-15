<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'harga' => $this->faker->randomFloat(2, 100, 9999.99),
            'stok' => $this->faker->randomNumber(3),
            'gambar' => 'default.png', // Ganti dengan URL atau path ke gambar default
            'deskripsi' => $this->faker->paragraph,
            'kategori_id' => $this->faker->numberBetween(1, 5), // Random number between 1 and 5
        ];
    }
}
