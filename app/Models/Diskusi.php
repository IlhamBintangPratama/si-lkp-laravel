<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;

    protected $table = 'diskusi';

    protected $fillable = [
        'id_guru',
        'judul',
        'isi',
        'id_komen'
    ];

    public function guru()
    {
        return $this->belongsTo('App\Models\Pendidik','id_guru', 'id');
    }
    public function komen()
    {
        return $this->belongsTo('App\Models\Komen','id_komen', 'id');
    }
}
