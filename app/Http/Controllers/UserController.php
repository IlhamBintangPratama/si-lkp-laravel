<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select('id','name','email','role')->where('role', '!=', '1')->paginate(12);
        // dd($user);
        return view('m_user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|integer',
        ]);

        try{
            $user = User::create([
            'name' => $request->get('nama'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            
        ]);
        

        return redirect('/m_user')->with('created','Data berhasil tersimpan!');
        }catch(\Exception $e){
            return redirect('/m_user')->with('warning','Data yang di input sudah ada!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);

        // $reset = User::find($id);
        // $reset->password = 12345;
        // $reset->save();

        return view('m_user.show', compact('user'));
    }

    public function reset($id)
    {

        $reset = User::find($id);
        $reset->password = Hash::make(12345);
        $reset->save();

        return redirect('m_user')->with('reseted', 'Password telah di reset');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('m_user.edit', compact('user'));
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
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::find($id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect('/m_user')->with('updated', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect('/m_user')->with('deleted', 'Data berhasil dihapus!');
    }
}
