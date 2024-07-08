<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        
        event(new Registered($user));

        Auth::login($user);
            return redirect('/dashboard_siswa');
            
    }
}
