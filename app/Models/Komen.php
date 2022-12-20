<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;

    protected $table = 'komen';

    protected $fillable = [
        'id_siswa',
        'id_guru',
        'isi',
        'parent'
    ];

    public function komensiswa(){
        return $this->belongsTo('App\Models\Siswa','id_siswa', 'id');
    }
    public function komenguru(){
        return $this->belongsTo('App\Models\Pendidik','id_guru', 'id');
    }
}
