<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\LsKelas;
use App\Models\Pendidik;
use App\Models\Penilaian;
use App\Models\SwKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::paginate(12);
        // dd($kelas->nama_kelas);
        return view('m_kelas.index', compact('kelas'));
    }

    public function index_siswa()
    {
            
            $kls = DB::table('kelas')
                ->join('sw_kelas', 'kelas.id', '=', 'sw_kelas.id_kelas')
                ->select('kelas.id','kelas.nama_kelas', DB::raw('count(id_guru) as total'))
                ->groupBy('kelas.id','kelas.nama_kelas')
                ->paginate(12);
        return view('master.manage_siswa.index', compact('kls'));
    }

    public function show_siswa($id_kelas)
    {
        // $kls = LsKelas::select('id_kelas','id_guru')->where('id_kelas', '=', $id_kelas)->get();
        $kelaspk = SwKelas::select('id_kelas')->groupBy('id_kelas')->where('id_kelas', '=', $id_kelas)->get();
        $kelaspendidik = SwKelas::select('sw_kelas.id','id_kelas','pendidiks.nama','sw_kelas.id_guru','sw_kelas.id_siswa','siswas.nama')
            ->join('siswas', 'id_siswa', '=', 'siswas.id')
            ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')->where('id_kelas', '=', $id_kelas)->paginate(12);
        // dd($kelaspendidik);
        
        return view('master.manage_siswa.show', compact('kelaspk','kelaspendidik'));
    }
    public function create_siswa($id_kelas){
        $kelaspk = SwKelas::select('id_kelas')->groupBy('id_kelas')->where('id_kelas', '=', $id_kelas)->get('id_kelas');
        $pendidik = LsKelas::select('ls_kelas.id_guru','pendidiks.nama','id_kelas')->groupBy('id_guru','id_kelas')->where('id_kelas', '=', $id_kelas)
            ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')->get('id_guru');
        // dd($pendidik);
        return view('master.manage_siswa.create', compact('kelaspk','pendidik'));
    }
    // function getPendidik($id_kelas){

    //     $get_pendidik = new LsKelas();
    //     $get_pendidik = $get_pendidik->select('ls_kelas.id','id_guru','stok','pendidiks.jns_brg')
    //                     ->where('ls_kelas.id_id_kelas','=',$id_kelas)
    //                     ->join('pendidiks', 'id_guru' , '=', 'pendidiks.id');
        
    //     // dd($get_pendidik);
    //     return response()->json($get_pendidik->get());
        
    // }

    public function store_siswa(Request $request){

        // $request->validate([
        //     'select' => 'integer',
        //     'id_kelas' => 'integer'
        // ]);

        $id_kelas = $request->id_kelas;
        $pendidik = $request->pendidik;
        $siswa = $request->siswa;
        // dd(count($siswa));
        $kelaspk = [];
        for($i=0; $i<count($siswa); $i++){
            
            array_push($kelaspk, ['id_kelas' => $id_kelas, 'id_guru' => $pendidik, 'id_siswa' => $siswa[$i]]);
        }
        
        SwKelas::insertOrIgnore($kelaspk);

        // $sisnilai = Penilaian::create([
        //     'id_siswa' => $kelaspk,
        //     'tema_praktek' => 
        // ]);
        // $kelaspk = LsKelas::create([
        //     'id_kelas' => $request->get('id_kelas'),
        //     'id_guru' => $request->get('select'),
        // ]);

        // $kelaspk->save();
        return redirect('k_siswa')->with('created', 'Data berhasil disimpan!');
    }

    public function destroy_siswa($id_siswa)
    {
        $kelaspk = SwKelas::findorfail($id_siswa);
        // dd($kelaspk);
        $kelaspk->delete();

        return redirect('k_siswa')->with('deleted', 'Data berhasil dihapus');
    }

    public function index_pendidik()
    {
            
            $kls = DB::table('kelas')
                ->join('ls_kelas', 'kelas.id', '=', 'ls_kelas.id_kelas')
                ->select('kelas.id','kelas.nama_kelas', DB::raw('count(id_guru) as total'))
                ->groupBy('kelas.id','kelas.nama_kelas')
                ->paginate(12);
            // dd($kls);
            // $kls = DB::table('ls_kelas')->groupBy('id_kelas')->paginate(12);

            // foreach ($ls_kelas as $key => $value) {
            //     $kls[$key]['kelas'] = Kelas::where('id', $value->id_kelas)->first();
            //     $kls[$key]['jumlah'] = LsKelas::where('id_kelas', $value->id_kelas)->count($value->id_kelas);
            // }

        // if($skelas == NULL){
        //     $skelas = LsKelas::select('kelas.nama_kelas','id_guru')
        //     // ->where('id_guru', '=', $spendidik['id'])
        //     ->join('kelas', 'id_kelas', '=', 'kelas.id')
        //     ->paginate(12);
        // }
        return view('master.manage_pendidik.index', compact('kls'));
    }
    
    public function create_pendidik($id_kelas){
        $kelaspk = LsKelas::select('id_kelas')->groupBy('id_kelas')->where('id_kelas', '=', $id_kelas)->get('id_kelas');
        // dd($kelaspk);
        return view('master.manage_pendidik.create', compact('kelaspk'));
    }

    public function store_pendidik(Request $request){

        // $request->validate([
        //     'select' => 'integer',
        //     'id_kelas' => 'integer'
        // ]);

        $id_kelas = $request->id_kelas;
        $select = $request->select;
        
        $kelaspk = [];
        for($i=0; $i<count($select); $i++){
            array_push($kelaspk, ['id_kelas' => $id_kelas, 'id_guru' => $select[$i]]);
        }
        
        LsKelas::insertOrIgnore($kelaspk);

        // $kelaspk = LsKelas::create([
        //     'id_kelas' => $request->get('id_kelas'),
        //     'id_guru' => $request->get('select'),
        // ]);

        // $kelaspk->save();
        return redirect('k_pendidik')->with('created', 'Data berhasil disimpan!');
    }

    public function edit_pendidik($id)
    {
        $skelas = LsKelas::findorfail($id);
        dd($skelas);
        return view('master.manage_pendidik.edit', compact('skelas'));
    }

    public function update_pendidik(Request $request, $id)
    {
        $request->validate([
            'ls_pendidik' => 'required|integer',
        ]);
        
        $skelas = LsKelas::create([
            ''
        ]);

        return view('master.manage_pendidik.edit', compact('skelas'));
    }
    public function show_pendidik($id_kelas)
    {
        // $kls = LsKelas::select('id_kelas','id_guru')->where('id_kelas', '=', $id_kelas)->get();
        $kelaspk = LsKelas::select('id_kelas')->groupBy('id_kelas')->where('id_kelas', '=', $id_kelas)->get();
        $kelaspendidik = LsKelas::select('ls_kelas.id','id_kelas','pendidiks.nama','ls_kelas.id_guru')
            ->join('pendidiks', 'id_guru', '=', 'pendidiks.id')->where('id_kelas', '=', $id_kelas)->paginate(12);
        // dd($kelaspendidik);
        
        return view('master.manage_pendidik.show', compact('kelaspk','kelaspendidik'));
    }

    public function destroy_pendidik($id_guru)
    {
        $kelaspk = LsKelas::findorfail($id_guru);
        // dd($kelaspk);
        $kelaspk->delete();

        return redirect('k_pendidik')->with('deleted', 'Data berhasil dihapus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m_kelas.create');
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
            'nama_kelas' => 'required|string',
        ]);

        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);
        $lskelas = LsKelas::create([
            'id_kelas' => $kelas->id,
            // 'jmlguru' => 0,
            // 'jmlsiswa' => 0
        ]);
        $swkelas = SwKelas::create([
            'id_kelas' => $kelas->id,
            // 'jmlguru' => 0,
            // 'id_guru' => 0
        ]);
        $swkelas->save();
        $kelas->save();
        $lskelas->save();

        return redirect('m_kelas')->with('created', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::findorfail($id);

        return view('m_kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findorfail($id);

        return view('m_kelas.edit', compact('kelas'));
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
            'nama_kelas' => 'required|string',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;

        $kelas->update();

        return redirect('m_kelas')->with('updated', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $kelas->delete();

        return redirect('m_kelas')->with('deleted', 'Data berhasil dihapus');
    }
}
