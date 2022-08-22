<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateAnswerForm extends Component
{
    public $answers = [];

    public function mount()
    {
        $this->answers = [
            [
                'answer' => 'Jawaban 1',
                'point' => 1,
            ],
        ];
    }

    public function addAnswer()
    {
        $this->answers[] = [
            'answer' => 'Jawaban ' . (count($this->answers) + 1),
            'point' => (count($this->answers) + 1),
        ];
    }

    public function deleteAnswer($index)
    {
        if (!(count($this->answers) <= 1)) {
            unset($this->answers[$index]);
            $this->answers = array_values($this->answers);
        }
    }

    public function render()
    {
        return view('livewire.create-answer-form');
    }
}
