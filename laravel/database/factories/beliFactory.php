<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\beli>
 */
class beliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => DB::table('users')->pluck('id')->random(),
            'id_barang' => DB::table('barang')->pluck('id')->random(),
            'jumlah' => fake()->randomDigitNotZero(),
            'status' => 'paid', // password
            'created_at' => fake()->dateTimeBetween($startDate = '-11 months', $endDate = 'now', $timezone = null),
        ];
    }
}
