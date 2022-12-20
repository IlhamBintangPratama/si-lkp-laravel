<?php

namespace App\Http\Controllers;

use App\Models\MateriHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_harian = MateriHarian::paginate(12);

        return view('u_pendidik.m_materi_h.index', compact('m_harian'));
    }

    public function index_siswa()
    {
        $m_harian = MateriHarian::paginate(12);

        return view('u_siswa.materi_h.index', compact('m_harian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('u_pendidik.m_materi_h.create');
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
            'judul' => 'string|required',
            'modul' => 'required|mimes:csv,docx,xls,pdf|max:2048',
            'deskripsi' => 'string|required'
        ]);

        $namaModul = $request->file('modul')->getClientOriginalName();
        $request->file('modul')->move('materi_file', $namaModul);

        $m_harian = MateriHarian::create([
            'judul' => $request->get('judul'),
            'modul' => $namaModul,
            // 'path' => $path,
            'deskripsi' => $request->get('deskripsi'),
        ]);
        $m_harian->save();

        return redirect('materi_harian')->with('created', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m_harian = MateriHarian::findorfail($id);
        $filename = $m_harian->modul;
        $path = storage_path("materi_file/{$filename}");
        // dd($filename);

        return view('u_pendidik.m_materi_h.show', compact('m_harian','path','filename'));
    }

    public function show_siswa($id)
    {
        $m_harian = MateriHarian::findorfail($id);
        $filename = $m_harian->modul;
        $path = storage_path("materi_file/{$filename}");
        // dd($filename);

        return view('u_siswa.materi_h.show', compact('m_harian','path','filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $m_harian = MateriHarian::findorfail($id);
        File::delete("materi_file/{$m_harian->modul}");
        $m_harian->delete();

        return redirect('materi_harian')->with('deleted', 'Data berhasil dihapus');
    }
}
