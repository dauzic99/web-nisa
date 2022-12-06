<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Fakultas Teknik',
                'address' => 'Jalan Gunung Kelua'
            ],
            [
                'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                'address' => 'Jalan Gunung Kelua'
            ],
            [
                'name' => 'Fakultas Ilmu Sosial dan Politik',
                'address' => 'Jalan Gunung Kelua'
            ],
            [
                'name' => 'Fakultas Ekonomi dan Bisnis',
                'address' => 'Jalan Gunung Kelua'
            ],
        ];

        DB::table('faculties')->insert($data);
    }
}
