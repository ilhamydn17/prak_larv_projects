<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'name' => 'Program Karir',
            'slug' => 'program-karir',
        ]);

        Program::create([
            'name' => 'Program Magang',
            'slug' => 'program-magang',
        ]);

        Program::create([
            'name' => 'Program Kunjugan Industri',
            'slug' => 'program-kunjungan-industri',
        ]);
    }
}
