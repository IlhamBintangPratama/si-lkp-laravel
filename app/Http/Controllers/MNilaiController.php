<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
// use App\Models\Siswa;
use App\Models\SwKelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_nilai = Penilaian::paginate(12);

        return view('u_pendidik.m_nilai.index', compact('m_nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cek = Auth::id();
        $guru = User::find($cek)->email;
        $siswa = SwKelas::select('sw_kelas.id_siswa','siswas.nama','sw_kelas.id_guru', 'pendidiks.email')->groupBy('id_siswa','id_guru')->where('pendidiks.email', '=', $guru)
                    ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')
                    ->join('siswas', 'id_siswa', '=', 'siswas.id')->get('id_siswa');
        // dd($guru);
        return view('u_pendidik.m_nilai.create', compact('siswa'));
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
            'siswa' => 'required',
            'tema' => 'required|string|max:55',
            'n_kreatif' => 'required',
            'n_ketrampilan' => 'required',
            'n_sikap' => 'required'
        ]);

        $nilai = Penilaian::create([
            'id_siswa' => $request->siswa,
            'tema_praktek' => $request->tema,
            'nilai_kreatif' => $request->n_kreatif,
            'nilai_ketrampilan' => $request->n_ketrampilan,
            'nilai_sikap' => $request->n_sikap
        ]);
        $nilai->save();

        return redirect('data_penilaian')->with('created', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = Penilaian::findorfail($id);

        return view('u_pendidik.m_nilai.show', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Penilaian::findorfail($id);
        $cek = Auth::id();
        $guru = User::find($cek)->email;
        $siswa = SwKelas::select('sw_kelas.id_siswa','siswas.nama','sw_kelas.id_guru', 'pendidiks.email')->groupBy('id_siswa','id_guru')->where('pendidiks.email', '=', $guru)
                    ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')
                    ->join('siswas', 'id_siswa', '=', 'siswas.id')->get('id_siswa');

        return view('u_pendidik.m_nilai.edit', compact('nilai','siswa'));
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
            'siswa' => 'required',
            'tema' => 'required|string',
            'n_kreatif' => 'required',
            'n_ketrampilan' => 'required',
            'n_sikap' => 'required'
        ]);

        $nilai = Penilaian::find($id);
        $nilai->id_siswa = $request->get('siswa');
        $nilai->tema_praktek = $request->get('tema');
        $nilai->nilai_kreatif = $request->get('n_kreatif');
        $nilai->nilai_ketrampilan = $request->get('n_ketrampilan');
        $nilai->nilai_sikap = $request->get('n_sikap');
        $nilai->update();

        // dd($nilai);

        return redirect('data_penilaian')->with('updated', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Penilaian::findorfail($id);
        $nilai->delete();

        return redirect('data_penilaian')->with('deleted', 'Data berhasil dihapus');
    }
}
