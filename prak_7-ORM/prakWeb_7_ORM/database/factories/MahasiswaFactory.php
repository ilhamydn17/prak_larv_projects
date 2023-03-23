<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->numerify('##########'),
            'nama' => $this->faker->name,
            'kelas' => $this->faker->randomElement([
                'TI2A',
                'TI2B',
                'TI2C',
                'TI2D',
                'TI2E',
                'TI2F',
                'TI2G',
                'TI2H',
                'TI2I',
            ]),
            'jurusan' => $this->faker->randomElement([
                'Teknik Informatika',
                'Sistem Informasi',
            ]),
            'email' => $this->faker->unique()->safeEmail,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2019-01-01'),
            'no_handphone' => $this->faker->numerify('##########'),
        ];
    }
}
