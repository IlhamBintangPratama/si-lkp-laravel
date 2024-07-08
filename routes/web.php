<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MHarianController;
use App\Http\Controllers\MNilaiController;
use App\Http\Controllers\MVideoController;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\Kelas;
use App\Models\MateriHarian;
use App\Models\MateriVideo;
use App\Models\Pendidik;
use App\Models\Penilaian;
use App\Models\Siswa;
use App\Models\SwKelas;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'logUser'])->name('logUser');
// Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('registrasi', [LoginController::class, 'registrasi']);
Route::post('registrasi', [LoginController::class, 'actionregister']);
Route::get('/email/verify', function (){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
    $request->fulfill();

    return redirect('dashboard_siswa');
})->middleware(['auth', 'cekrole:3', 'signed'])->name('verification.verify');

Route::get('/dashboard_siswa', function(){
    return view('u_siswa.dashboard');
})->middleware(['auth', 'cekrole:3', 'verified']);

// Route::get('/', function () {

//     $id = Auth::id();

//     $user = @User::find($id)->role;
    
//     if($user == "1"){
        
//         return redirect('admin');
//     }elseif($user == "2"){
//         // dd($user);
//         return redirect('dashboard_pendidik');
//     }elseif($user  == "3"){
//         return redirect('dashboard_siswa');
//     }else{
//     return view('login');
//     }
// });
//Route Admin
Route::group(['middleware'=>'auth','cekrole:1'], function () {
Route::get('admin', [HomeController::class, 'index_admin']);
Route::get('m_user', [UserController::class, 'index']);
Route::get('m_user/create', [UserController::class, 'create']);
Route::post('m_user', [UserController::class, 'store']);
Route::get('/m_user/{id}/show', [UserController::class, 'show']);
Route::post('/m_user/{id}/reset', [UserController::class, 'reset']);
Route::get('/m_user/{id}/edit', [UserController::class, 'edit']);
Route::post('/m_user/{id}/update', [UserController::class, 'update']);
Route::post('/m_user/{id}/destroy', [UserController::class, 'destroy']);

Route::get('m_siswa/create', [SiswaController::class, 'create']);
Route::post('m_siswa', [SiswaController::class, 'store']);
Route::get('m_siswa', [SiswaController::class, 'index']);
Route::get('/m_siswa/{id}/show', [SiswaController::class, 'show']);
Route::get('/m_siswa/{id}/edit', [SiswaController::class, 'edit']);
Route::post('/m_siswa/{id}/update', [SiswaController::class, 'update']);
Route::post('/m_siswa/{id}/destroy', [SiswaController::class, 'destroy']);

Route::get('m_pendidik/create', [PendidikController::class, 'create']);
Route::post('m_pendidik', [PendidikController::class, 'store']);
Route::get('m_pendidik', [PendidikController::class, 'index']);
Route::get('/m_pendidik/{id}/show', [PendidikController::class, 'show']);
Route::get('/m_pendidik/{id}/edit', [PendidikController::class, 'edit']);
Route::post('/m_pendidik/{id}/update', [PendidikController::class, 'update']);
Route::post('/m_pendidik/{id}/destroy', [PendidikController::class, 'destroy']);

Route::get('m_kelas/create', [KelasController::class, 'create']);
Route::post('m_kelas', [KelasController::class, 'store']);
Route::get('m_kelas', [KelasController::class, 'index']);
Route::get('/m_kelas/{id}/show', [KelasController::class, 'show']);
Route::get('/m_kelas/{id}/edit', [KelasController::class, 'edit']);
Route::post('/m_kelas/{id}/update', [KelasController::class, 'update']);
Route::post('/m_kelas/{id}/destroy', [KelasController::class, 'destroy']);

Route::get('k_pendidik', [KelasController::class, 'index_pendidik']);
Route::get('k_pendidik/{id}/show', [KelasController::class, 'show_pendidik']);
Route::get('k_pendidik/{id}/create', [KelasController::class, 'create_pendidik']);
Route::post('k_pendidik', [KelasController::class, 'store_pendidik']);
Route::post('/k_pendidik/{id}/destroy', [KelasController::class, 'destroy_pendidik']);

Route::get('k_siswa', [KelasController::class, 'index_siswa']);
Route::get('k_siswa/{id}/show', [KelasController::class, 'show_siswa']);
Route::get('k_siswa/{id}/create', [KelasController::class, 'create_siswa']);
Route::post('k_siswa', [KelasController::class, 'store_siswa']);
Route::post('/k_siswa/{id}/destroy', [KelasController::class, 'destroy_siswa']);

Route::get('account', [ProfileController::class, 'showAdmin']);
Route::post('account', [ProfileController::class, 'changeProfile'])->name('changeProfile');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
//Route Pendidik
Route::group(['middleware'=>'auth','cekrole:2'], function () {
Route::get('/dashboard_pendidik', function () {
    $m_pelajaran = MateriHarian::all();
    $m_video = MateriVideo::all();
    $id = Auth::id();
    $profil = User::find($id)->email;

    
    $siswa = SwKelas::select('id_siswa','pendidiks.email')
                ->where('pendidiks.email', '=', $profil)
                ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')
                ->get('id_siswa');
                
                // dd($siswa);
    $nilai = Penilaian::all();
    return view('u_pendidik.dashboard', compact('nilai', 'siswa', 'm_pelajaran', 'm_video'));
});

Route::get('materi_harian', [MHarianController::class, 'index']);
Route::get('materi_harian/create', [MHarianController::class, 'create']);
Route::post('materi_harian', [MHarianController::class, 'store']);
Route::get('/materi_harian/{id}/show', [MHarianController::class, 'show']);
Route::get('/materi_harian/{id}/edit', [MHarianController::class, 'edit']);
Route::post('/materi_harian/{id}/update', [MHarianController::class, 'update']);
Route::post('/materi_harian/{id}/destroy', [MHarianController::class, 'destroy']);

Route::get('materi_video', [MVideoController::class, 'index']);
Route::get('materi_video/create', [MVideoController::class, 'create']);
Route::post('materi_video', [MVideoController::class, 'store']);
Route::get('/materi_video/{id}/show', [MVideoController::class, 'show']);
Route::get('/materi_video/{id}/edit', [MVideoController::class, 'edit']);
Route::post('/materi_video/{id}/update', [MVideoController::class, 'update']);
Route::post('/materi_video/{id}/destroy', [MVideoController::class, 'destroy']);

Route::get('data_penilaian', [MNilaiController::class, 'index']);
Route::get('data_penilaian/create', [MNilaiController::class, 'create']);
Route::post('data_penilaian', [MNilaiController::class, 'store']);
Route::get('/data_penilaian/{id}/show', [MNilaiController::class, 'show']);
Route::get('/data_penilaian/{id}/edit', [MNilaiController::class, 'edit']);
Route::post('/data_penilaian/{id}/update', [MNilaiController::class, 'update']);
Route::post('/data_penilaian/{id}/destroy', [MNilaiController::class, 'destroy']);

Route::get('diskusi', [DiskusiController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::group(['middleware'=>'auth','cekrole:3'], function () {
    Route::get('/dashboard_siswa', function () {
        // $m_pelajaran = MateriHarian::all();
        // $m_video = MateriVideo::all();
        // $id = Auth::id();
        // $profil = User::find($id)->email;
    
        
        // $siswa = SwKelas::select('id_siswa','pendidiks.email')
        //             ->where('pendidiks.email', '=', $profil)
        //             ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')
        //             ->get('id_siswa');
                    
        //             // dd($siswa);
        // $nilai = Penilaian::all();
        return view('u_siswa.dashboard');
    });
Route::get('mat_harian', [MHarianController::class, 'index_siswa']);
Route::get('/mat_harian/{id}/show', [MHarianController::class, 'show_siswa']);

Route::get('mat_video', [MVideoController::class, 'index_siswa']);
Route::get('/mat_video/{id}/show', [MVideoController::class, 'show_siswa']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});