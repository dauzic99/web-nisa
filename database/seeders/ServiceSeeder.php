<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    // protected $nilai = [2.5996, 3.064, 3.532, 4];
    public function run()
    {
        // Service::factory(3)->create()
        //     ->each(function ($service) {
        //         $service->questions()
        //             ->saveMany(Question::factory(4))
        //             ->create([
        //                 'service_id' => $service->id
        //             ])
        //             ->each(function ($question) {
        //                 foreach (range(0, 3) as $iteration) {
        //                     Answer::factory(1)->create([
        //                         'point' => $this->nilai[$iteration],
        //                         'question_id' => $question->id
        //                     ]);
        //                 }
        //             });
        //     });

        $services = [
            [
                'name' => 'Pelayanan Secara Umum'
            ],
            [
                'name' => 'Bagian Umum dan Keuangan'
            ],
            [
                'name' => 'Bagian Persidangan dan Perundang - Undangan'
            ],
            [
                'name' => 'Bagian Fasilitasi Penganggaran dan Pengawasan'
            ],
        ];
        DB::table('services')->insert($services);
    }
}
