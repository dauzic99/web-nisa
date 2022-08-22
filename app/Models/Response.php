<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer_id',
        'respondent_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
