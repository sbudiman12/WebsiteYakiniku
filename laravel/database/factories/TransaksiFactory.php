<?php

namespace Database\Factories;

use App\Http\Middleware\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date,
            'bukti_transfer' => $this->faker->word, // You might want to adjust this based on your needs
            'user_id' => $this->faker->numberBetween(1, 5),
            'status_id' => $this->faker->numberBetween(1, 2),
            'delivery_id' => $this->faker->randomElement([1, 2]),
            'alamat' => $this->faker->address
        ];
    }
}
