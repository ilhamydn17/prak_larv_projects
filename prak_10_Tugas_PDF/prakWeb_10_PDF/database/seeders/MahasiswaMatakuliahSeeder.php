<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data into table mahasiswa_matakuliah
        $mahasiswa_matakuliah = [
            [
                'mahasiswa_id' => 1,
                'mata_kuliah_id' => 1,
                'nilai' => 89
            ]
        ];

        DB::table('mahasiswa_matakuliah')->insert($mahasiswa_matakuliah);

    }
}
