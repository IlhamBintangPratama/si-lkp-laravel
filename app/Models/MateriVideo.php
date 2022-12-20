<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriVideo extends Model
{
    use HasFactory;

    protected $table = 'materi_videos';

    protected $fillable = [
        'judul',
        'videos',
        // 'path',
        'deskripsi',
        'created_at'
    ];
}
