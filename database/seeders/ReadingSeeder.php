<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReadingSeeder extends Seeder
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
                'PM10' => 50,
                'NO2' => 70,
                'CO' => 90,
                'O2' => 80,
                'faculty_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'PM10' => 50,
                'NO2' => 70,
                'CO' => 60,
                'O2' => 80,
                'faculty_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'PM10' => 50,
                'NO2' => 30,
                'CO' => 90,
                'O2' => 80,
                'faculty_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'PM10' => 40,
                'NO2' => 60,
                'CO' => 70,
                'O2' => 70,
                'faculty_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('readings')->insert($data);
    }
}
