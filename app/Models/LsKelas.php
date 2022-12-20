<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LsKelas extends Model
{
    use HasFactory;

    protected $table = 'ls_kelas';

    protected $fillable = [
        'id',
        'id_kelas',
        // 'id_siswa',
        'id_guru'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas','id_kelas', 'id');
    }
    public function gurukelas()
    {
        return $this->belongsTo('App\Models\Kelas','id_guru', 'id');
    }

}
