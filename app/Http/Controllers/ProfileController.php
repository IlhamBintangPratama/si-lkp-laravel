<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdmin()
    {
        $profile = User::select('id','name','email')->where('id','=',Auth::user()->id)->first();

        return view('p_admin.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeProfile(Request $request){
        if (!Hash::check($request->get('current-password'), Auth::user()->password)) {
            // The passwords matches
            return redirect()->back()->with("errors","Kata sandi Anda saat ini tidak cocok dengan kata sandi yang Anda berikan. Silakan coba lagi.");
        }

        $rules = [
            "name" => "required",
            "email" => "required",
            "current-password" => 'required'
        ];

        $messages = [
            "required" => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);

        $profile = User::findOrFail(Auth::user()->id);

        if($request->post("new-password")){
            if(Hash::check($request->get('new-password'), Auth::user()->password)){
                //Current password and new password are same
                return redirect()->back()->with("errors","Kata Sandi Baru tidak boleh sama dengan kata sandi Anda saat ini. Silakan pilih kata sandi yang berbeda.");
            }else if($request->get("new-password") !== $request->get('new-password-confirm')){
                return redirect()->back()->with("errors","Kata Sandi Baru tidak cocok dengan konfirmasi sandi");
            }else{
                $profile->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->get('new-password'))
                ]);
            }

        }else{
            $profile->update([
                "name" => $request->name,
                "email" => $request->email
            ]);
        }

        
        return redirect()->back()->with("success","Profile berhasil terupdate!");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
