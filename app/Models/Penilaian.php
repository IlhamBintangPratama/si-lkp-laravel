<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'tema_praktek',
        'nilai_kreatif',
        'nilai_ketrampilan',
        'nilai_sikap',
        'tanggal'
    ];

    public function sisnilai()
    {
        return $this->belongsTo('App\Models\Siswa','id_siswa', 'id');
    }
    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }
}
