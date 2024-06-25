<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;

    protected $fillable = [
        'PM10',
        'CO',
        'NO2',
        'Ozon',
        'faculty_id',
    ];

    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }
}
