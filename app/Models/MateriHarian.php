<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriHarian extends Model
{
    use HasFactory;

    protected $table = 'materi_harians';

    protected $fillable = [
        'judul',
        'modul',
        'path',
        'deskripsi',
        'created_at'
    ];
}
