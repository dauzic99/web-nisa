<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use App\Models\Suggestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Respondent::factory(55)->create()
            ->each(function ($respondent) {
                $questions = Question::all();
                foreach ($questions as $key => $question) {
                    $answer = Answer::where('question_id', $question->id)
                        ->where('point', array_rand([2.5996, 3.064, 3.532, 4]))->first();
                    Response::factory(1)->create([
                        'question_id' => $question->id,
                        'respondent_id' => $respondent->id,
                        'answer_id' => $answer->id,
                    ]);
                }
                Suggestion::factory(1)->create([
                    'respondent_id' => $respondent->id,
                ]);
            });
    }
}
