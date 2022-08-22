<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Service;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Pertanyaan";
    public function index()
    {
        $questions = Question::all();
        return view('admin.question.index',[
            'questions'=>$questions,
            'title' => $this->title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.question.create',[
            'services'=>$services,
            'title' => $this->title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->except(['_token','answers']));
        $question->answers()->createMany($request->answers);
        return redirect()->route('question.index')->with('status','Data pertanyaan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.question.show',[
            'question'=>$question,
            'title' => $this->title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $services = Service::all();
        return view('admin.question.edit',[
            'services'=>$services,
            'question'=>$question,
            'title' => $this->title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        // dd($request->all());
        $question->update($request->except(['_token','answers']));
        foreach ($request->answers as $answer) {
            if (isset($answer['id'])) {
                $question->answers()->where('id',$answer['id'])->update(['answer'=>$answer['answer'],'point'=>$answer['point']]);
            }else{
                $question->answers()->create(['answer'=>$answer['answer'],'point'=>$answer['point']]);
            }
        }
        return redirect()->route('question.index')->with('status','Data pertanyaan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('question.index',)->with('status','Data unsur pelayanan berhasil dihapus');
    }
}
