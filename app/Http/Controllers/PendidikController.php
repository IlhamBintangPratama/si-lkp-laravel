<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Pendidik;
use Illuminate\Http\Request;

class PendidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidik = Pendidik::select('pendidiks.id','nik','nama','jenis_kelamin.gender','email','no_hp')
            ->join('jenis_kelamin', 'jenis_kelamin', '=', 'jenis_kelamin.id')->paginate(12);
        return view('m_pendidik.index', compact('pendidik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m_pendidik.create');
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
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jk' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $pendidik = Pendidik::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        $pendidik->save();

        return redirect('m_pendidik')->with('created', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidik = Pendidik::findorfail($id);

        return view('m_pendidik.show', compact('pendidik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendidik = Pendidik::findorfail($id);
        $genders = Gender::all();
        return view('m_pendidik.edit', compact('pendidik', 'genders'));
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
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jk' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $pendidik = Pendidik::find($id);
        $pendidik->nik = $request->get('nik');
        $pendidik->nama = $request->get('nama');
        $pendidik->jenis_kelamin = $request->get('jk');
        $pendidik->email = $request->get('email');
        $pendidik->no_hp = $request->get('no_hp');
        $pendidik->update();

        return redirect('m_pendidik')->with('updated', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidik = Pendidik::findorfail($id);
        $pendidik->delete();

        return redirect('m_pendidik')->with('deleted', 'Data berhasil dihapus');
    }
}
