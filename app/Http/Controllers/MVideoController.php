<?php

namespace App\Http\Controllers;

use App\Models\MateriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_video = MateriVideo::paginate(12);

        return view('u_pendidik.m_materi_v.index', compact('m_video'));
    }

    public function index_siswa()
    {
        $m_video = MateriVideo::paginate(12);

        return view('u_siswa.materi_v.index', compact('m_video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('u_pendidik.m_materi_v.create');
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
            'judul' => 'required|string',
            'video' => 'required|mimetypes:video/mp4,video/x-flv,video/quicktime|max:20000',
            'deskripsi' => 'required|string'

        ]);

        $namaVideo = $request->file('video')->getClientOriginalName();
        $request->file('video')->move('materi_file', $namaVideo);

        $m_video = MateriVideo::create([
            'judul' => $request->get('judul'),
            'videos' => $namaVideo,
            // 'path' => $path,
            'deskripsi' => $request->get('deskripsi'),
        ]);
        $m_video->save();

        return redirect('materi_video')->with('created', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m_video = MateriVideo::findorfail($id);
        $filename = $m_video->videos;

        return view('u_pendidik.m_materi_v.show', compact('filename', 'm_video'));
    }

    public function show_siswa($id)
    {
        $m_video = MateriVideo::findorfail($id);
        $filename = $m_video->videos;

        return view('u_siswa.materi_v.show', compact('filename', 'm_video'));
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
        $m_video = MateriVideo::findorfail($id);
        File::delete("materi_file/{$m_video->videos}");
        $m_video->delete();

        return redirect('materi_video')->with('deleted', 'Data berhasil dihapus');
    }
}
