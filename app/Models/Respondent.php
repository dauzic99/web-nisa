<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    protected $fillable = [
        'fraction',
        'gender',
        'ip_address'
    ];


    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function suggestion()
    {
        return $this->hasOne(Suggestion::class);
    }
}
