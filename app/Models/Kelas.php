<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    
    protected $fillable = [
        'id',
        'nama_kelas',
    ];

    // public function pendidik()
    // {
    //     return $this->belongsTo('App\Models\Pendidik','id_guru', 'id');
    // }
    // public function siswa()
    // {
    //     return $this->belongsTo('App\Models\Siswa','id_siswa', 'id');
    // }
    public function kelas()
    {
        return $this->hasMany('App\Models\LsKelas','id_kelas', 'id');
    }
}
