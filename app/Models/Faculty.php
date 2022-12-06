<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
    ];

    public function readings()
    {
        return $this->hasMany(Reading::class);
    }

    public function getISPU()
    {
        $latestReading = $this->readings->sortByDesc('created_at')->first();
        $ispu = $latestReading->PM10 + $latestReading->NO2 + $latestReading->O2 + $latestReading->CO;
        return $ispu;
    }

    public function getLatestDate()
    {
        $latestReading = $this->readings->sortByDesc('created_at')->first();
        return Carbon::parse($latestReading->created_at)->format('d-M-Y');
    }

    public function getLatestReading()
    {
        $latestReading = $this->readings->sortByDesc('created_at')->first();
        return $latestReading;
    }
}
