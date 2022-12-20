<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamin';

    protected $fillable = [
        'gender',
    ];

    public function pendidik()
    {
        return $this->hasMany('App\Models\Pendidik','jenis_kelamin', 'id');
    }
    public function siswa()
    {
        return $this->hasMany('App\Models\Siswa','jenis_kelamin', 'id');
    }
}
