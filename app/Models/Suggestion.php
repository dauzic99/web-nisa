<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'respondent_id',
    ];


    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
