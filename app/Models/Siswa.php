<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'email',
        'no_hp',
    ];

    public function gender2()
    {
        return $this->belongsTo('App\Models\Gender','jenis_kelamin', 'id');
    }
    public function kelas2()
    {
        return $this->hasMany('App\Models\Kelas','id_siswa', 'id');
    }
    public function sisnilai()
    {
        return $this->hasMany('App\Models\Penilaian','id_siswa', 'id');
    }
    public function siskelas()
    {
        return $this->hasMany('App\Models\SwKelas','id_siswa', 'id');
    }
    public function komentar()
    {
        return $this->hasMany('App\Models\Komen','id_siswa', 'id');
    }
    
}
