<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwKelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kelas',
        'id_guru',
        'id_siswa'
    ];

    public function siskelas()
    {
        return $this->belongsTo('App\Models\Siswa','id_siswa', 'id');
    }
    public function lskelas()
    {
        return $this->belongsTo('App\Models\Pendidik','id_guru', 'id');
    }
}
