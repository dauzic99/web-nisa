<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [];
        array_push($answers, ...$this->getAnswer('Sederhana', 1));
        array_push($answers, ...$this->getAnswer('Cocok', 2));
        array_push($answers, ...$this->getAnswer('Mudah', 3));
        array_push($answers, ...$this->getAnswer('Distandarkan', 4));
        array_push($answers, ...$this->getAnswer('Cepat', 5));
        array_push($answers, ...$this->getAnswer('Tepat', 6));
        array_push($answers, ...$this->getAnswer('Sesuai', 7));
        array_push($answers, ...$this->getAnswer('Mampu', 8));
        array_push($answers, ...$this->getAnswer('Ahli dan Terampil', 9));
        array_push($answers, ...$this->getAnswer('Bertanggungjawab', 10));
        array_push($answers, ...$this->getAnswer('Sopan', 11));
        array_push($answers, ...$this->getAnswer('Dilaksanakan', 12));
        array_push($answers, ...$this->getAnswer('Mudah', 13));
        array_push($answers, ...$this->getAnswer('Cepat', 14));
        array_push($answers, ...$this->getAnswer('Baik', 15));
        array_push($answers, ...$this->getAnswer('Baik', 16));
        array_push($answers, ...$this->getAnswer('Baik', 17));
        array_push($answers, ...$this->getAnswer('Baik', 18));
        array_push($answers, ...$this->getAnswer('Baik', 19));
        array_push($answers, ...$this->getAnswer('Baik', 20));
        array_push($answers, ...$this->getAnswer('Baik', 21));
        array_push($answers, ...$this->getAnswer('Baik', 22));
        array_push($answers, ...$this->getAnswer('Baik', 23));
        array_push($answers, ...$this->getAnswer('Baik', 24));
        array_push($answers, ...$this->getAnswer('Cepat dan Tepat', 25));
        array_push($answers, ...$this->getAnswer('Mendukung', 26));
        array_push($answers, ...$this->getAnswer('Cepat', 27));
        array_push($answers, ...$this->getAnswer('Baik', 28));
        array_push($answers, ...$this->getAnswer('Baik', 29));
        array_push($answers, ...$this->getAnswer('Baik', 30));
        array_push($answers, ...$this->getAnswer('Baik', 31));
        array_push($answers, ...$this->getAnswer('Cepat', 32));
        array_push($answers, ...$this->getAnswer('Baik', 33));
        array_push($answers, ...$this->getAnswer('Baik', 34));
        array_push($answers, ...$this->getAnswer('Baik', 35));
        array_push($answers, ...$this->getAnswer('Baik', 36));
        array_push($answers, ...$this->getAnswer('Baik', 37));
        array_push($answers, ...$this->getAnswer('Baik', 38));
        array_push($answers, ...$this->getAnswer('Baik dan Update', 39));
        array_push($answers, ...$this->getAnswer('Baik', 40));
        array_push($answers, ...$this->getAnswer('Baik', 41));
        array_push($answers, ...$this->getAnswer('Baik', 42));
        array_push($answers, ...$this->getAnswer('Baik', 43));
        array_push($answers, ...$this->getAnswer('Cepat dan Tepat', 44));
        array_push($answers, ...$this->getAnswer('Mendukung', 45));
        array_push($answers, ...$this->getAnswer('Baik', 46));
        array_push($answers, ...$this->getAnswer('Baik', 47));
        array_push($answers, ...$this->getAnswer('Baik', 48));

        DB::table('answers')->insert($answers);
    }

    public function getAnswer($word, $question_id)
    {

        $point = [2.5996, 3.064, 3.532, 4];
        $word_plus = ['Tidak ', 'Kurang ', '', 'Sangat '];
        $answer = [];
        foreach ($point as $key => $value) {
            array_push($answer, [
                'answer' => $word_plus[$key] . $word,
                'point' => $point[$key],
                'question_id' => $question_id
            ]);
        }
        return $answer;
    }
}
