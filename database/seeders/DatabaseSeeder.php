<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        // \App\Models\User::factory(1)->create();
        $this->call([
            FacultySeeder::class,
            ReadingSeeder::class,
            // ServiceSeeder::class,
            // QuestionSeeder::class,
            // AnswerSeeder::class,
        ]);
    }
}
