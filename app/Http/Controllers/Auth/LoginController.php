<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\LsKelas;
use App\Models\Siswa;
use App\Models\SwKelas;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) 
        {   
            if( auth()->user()->role == 1){
            return redirect('/admin');
            }
            elseif( auth()->user()->role == 2){
            return redirect('/dashboard_pendidik');
            }
            elseif( auth()->user()->role == 3){
            return redirect('/dashboard_siswa');
            }
        }
        else
        {
            return view('login');
        }
    }

    public function logUser(Request $request)
    {
        if($request->email != null){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])){
                return redirect('/admin');
            }
            elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 2])){
                return redirect('/dashboard_pendidik');
            }
            elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 3])){
                return redirect('/dashboard_siswa');
            }
            return redirect('/')->with('message', 'username dan password salah');
        }else{
            return redirect('/')->with('message', 'Silahkan masukan username dan password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
            'role' => 3,
        ]);
        $siswa = Siswa::create([
            'nik' => $request->nik,
            'nama' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        $id = $siswa->id;
        $lskelas = LsKelas::select('id_kelas','id_guru')->where('id_kelas', '=', $request->kelas)->where('id_guru', '!=', NULL)->first();
        $test = $lskelas->id_guru;
        
        $kelas = SwKelas::create([
            'id_kelas' => $request->kelas,
            'id_siswa' => $id,
            'id_guru' => $test,
        ]);
        event(new Registered($user));

        Auth::login($user);
            return redirect('/dashboard_siswa');
            
    }
}
