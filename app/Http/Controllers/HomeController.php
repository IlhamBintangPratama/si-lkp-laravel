<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendidik;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index_admin()
    {
        $user = User::all();
        $siswa = Siswa::all();
        $pendidik = Pendidik::all();
        $kelas = Kelas::all();
        return view('dashboard', compact('user', 'siswa', 'pendidik', 'kelas'));
    }
}
