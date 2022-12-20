<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidik extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nik',
        'nama',
        'jenis_kelamin',
        'email',
        'no_hp',
    ];
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender','jenis_kelamin', 'id');
    }
    public function kelas1()
    {
        return $this->hasMany('App\Models\Kelas','id_guru', 'id');
    }
    public function penkelas()
    {
        return $this->hasMany('App\Models\LsKelas','id_guru', 'id');
    }
    public function lskelas()
    {
        return $this->hasMany('App\Models\SwKelas','id_guru', 'id');
    }
    public function diskusi()
    {
        return $this->hasMany('App\Models\Diskusi','id_guru', 'id');
    }
    public function komentar()
    {
        return $this->hasMany('App\Models\Komen','id_guru', 'id');
    }
}
