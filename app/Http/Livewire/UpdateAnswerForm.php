<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Answer;

class UpdateAnswerForm extends Component
{
    public $answers = [];

    protected $listeners = ['deleteAnswer'];


    public function mount($answers)
    {
        $this->answers = $answers;
    }

    public function addAnswer()
    {
        $this->answers[] = [
            'answer'=>'Jawaban '.(count($this->answers)+1),
            'point'=>(count($this->answers)+1),
            'isNew'=> true,
        ];
    }

    public function deleteAnswer($index,$isNew)
    {
        if (!(count($this->answers) <= 1)) {
            if ($isNew) {
                unset($this->answers[$index]);
                $this->answers = array_values($this->answers);
            } else {
                $answer =  Answer::findOrFail($this->answers[$index]['id']);
                $answer->delete();
                unset($this->answers[$index]);
                $this->answers = array_values($this->answers);
            }
        }
    }

    public function deleteConfirm($index,$isNew)
    {
        $this->emit('swal', 'Apakah anda yakin menghapus pilihan jawaban?', 'warning',$index,$isNew);
    }

    public function render()
    {
        return view('livewire.update-answer-form');
    }
}
