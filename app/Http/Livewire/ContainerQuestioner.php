<?php

namespace App\Http\Livewire;

use App\Models\Period;
use App\Models\Respondent;
use App\Models\Response;
use App\Models\Suggestion;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;


class ContainerQuestioner extends Component
{
    public $services;
    public $questions;
    public $previousQuestion;
    public $previousQuestionKey;
    public $forms = [];
    public $completeForm;
    public $currentIndexService;
    public $questionDisplay;


    public $identity;

    public $suggestion;
    public $suggestion_content;

    public $nextButton;
    public $beforeButton;
    public $sendButton;

    public $fraction = 'Fraksi Golkar';
    public $gender = 'Laki-Laki';
    public $ip;

    public function mount($services, $ip)
    {
        $this->services = $services;
        $this->ip = $ip;
        $this->currentIndexService = -1;
        $this->completeForm = false;


        $this->questionDisplay = false;
        $this->identity = true;
        $this->nextButton = true;
        $this->beforeButton = false;
        $this->sendButton = false;
    }

    public function nextForm()
    {
        // dd($this->forms);
        if ($this->identity) {
            $validateStatus = true;

            if ($this->fraction == '' || $this->gender == '') {
                $this->addError("identity", 'Identitas Wajib Diisi');
                $validateStatus = false;
            }

            if ($validateStatus) {
                $this->identity = false;
                $this->suggestion = false;
                $this->questionDisplay = true;
                $this->beforeButton = true;
            }
        }
        if ($this->identity == false) {
            if ($this->suggestion) {
                $validateStatus = true;
                $this->nextButton = false;
                $this->sendButton = true;
                if ($this->suggestion_content == '') {
                    $this->addError("suggestion", 'Silahkan isi form saran dan masukan');
                    $validateStatus = false;
                }

                if ($validateStatus) {
                    $this->identity = false;
                    $this->questionDisplay = false;

                    $this->beforeButton = true;
                }
            } else {
                $validateStatus = true;
                $this->currentIndexService++;
                if ($this->currentIndexService == 0) {
                    if ($this->currentIndexService == count($this->services)) {
                        $this->nextButton = false;
                        $this->suggestion = true;
                        $this->sendButton = true;
                        $this->questionDisplay = false;
                    }

                    if ($this->currentIndexService != count($this->services)) {
                        $nextQuestions = $this->services[($this->currentIndexService)]->questions;
                        foreach ($nextQuestions as $key => $question) {
                            $this->forms[$this->currentIndexService][] = [
                                'id' => $question->id,
                                'content' => $question->content,
                                'answer' => $question->answers,
                                'responses' => '',
                            ];
                        }
                    } else {
                        $this->nextButton = false;
                        $this->suggestion = true;
                        $this->sendButton = true;
                        $this->questionDisplay = false;
                    }
                } else {
                    // dd($this->forms);
                    $validateStatus = $this->validateForm(($this->currentIndexService - 1));
                    // dd($validateStatus);
                    if ($validateStatus) {
                        if ($this->currentIndexService ==  count($this->services)) {
                            $this->nextButton = false;
                            $this->suggestion = true;
                            $this->sendButton = true;
                            $this->questionDisplay = false;
                        }
                        if ($this->currentIndexService != count($this->services)) {
                            $nextQuestions = $this->services[($this->currentIndexService)]->questions;
                            $this->forms[$this->currentIndexService] = [];
                            foreach ($nextQuestions as $key => $question) {
                                $this->forms[$this->currentIndexService][] = [
                                    'id' => $question->id,
                                    'content' => $question->content,
                                    'answer' => $question->answers,
                                    'responses' => '',
                                ];
                            }
                        } else {
                            $this->nextButton = false;
                            $this->suggestion = true;
                            $this->sendButton = true;
                            $this->questionDisplay = false;
                        }
                    } else {
                        $this->currentIndexService--;
                    }
                }
            }
        }

        // dd($this->forms);
        // dd($nextForm->data);
    }

    public function validateForm($indexService)
    {
        $validate = true;
        foreach ($this->forms[$indexService] as $questionIndex => $question) {
            if ($question['responses'] == '') {
                $this->addError("answer[$indexService][$questionIndex][responses]", 'Pertanyaan ini wajib diisi');
                $validate = false;
            }
        }
        return $validate;
    }

    public function beforeForm()
    {
        if (!(count($this->forms) <= 1)) {
            unset($this->forms[$this->currentIndexService]);
            // dd($this->forms);
            if ($this->suggestion) {
                $this->suggestion = false;
                $this->questionDisplay = true;
            }
            $this->forms = array_values($this->forms);
            $this->nextButton = true;
            $this->sendButton = false;
            $this->currentIndexService--;
        } else {
            $this->identity = true;
            $this->questionDisplay = false;
            $this->beforeButton = false;
        }
    }

    public function saveForm()
    {
        // dd($this->name . "\n" . $this->age . "\n" . $this->gender . "\n" . $this->job . "\n" . $this->education);
        // dd($this->forms);

        $period = Period::where('is_active', 1)->latest()->first();
        $startMonth = 1;
        if ($period->period == 2) {
            $startMonth = 7;
        }
        $created_at = date($period->year . '-' . $startMonth . '-01');

        $respondent = new Respondent();
        $respondent->fraction = $this->fraction;
        $respondent->gender = $this->gender;
        $respondent->ip_address = $this->ip;
        $respondent->created_at = $created_at;
        $respondent->save();

        $data_suggest = new Suggestion();
        $data_suggest->content = $this->suggestion_content;
        $data_suggest->respondent_id = $respondent->id;
        $data_suggest->save();

        foreach ($this->forms as $service) {
            foreach ($service as $question) {
                $response = new Response();
                $response->respondent_id = $respondent->id;
                $response->question_id = $question['id'];
                $response->answer_id = $question['responses'];
                $response->save();
            }
        }
        // Cookie::has('cookie-consent');
        Cookie::queue(Cookie::forever('respondent', true));
        $this->completeForm = true;
        $this->nextButton = false;
        $this->sendButton = false;
        $this->beforeButton = false;
        $this->forms = [];
    }

    public function render()
    {
        return view('livewire.container-questioner');
    }
}
