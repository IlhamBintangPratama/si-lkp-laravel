<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Pendidik;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    
    public function index_laporan()
    {
        $laporan = Penilaian::select('penilaians.id','siswas.nama','tema_praktek','nilai_kreatif','nilai_ketrampilan','nilai_sikap')
            ->join('siswas', 'id_siswa', '=', 'siswas.id')->paginate(12);
            // dd($laporan);
        return view('a_laporan.index', compact('laporan'));
    }

    public function tanggal(Request $request)
    {
        try{
            $awal = $request->dari;
            $akhir = $request->sampai;
            $tanggal = Penilaian::groupBy('created_at')->get('created_at');
            $lapstok = Penilaian::select('penilaians.id','created_at','siswas.nama','tema_praktek','nilai_kreatif','nilai_ketrampilan','nilai_sikap')
            ->whereDate('created_at', '>=', $awal)->whereDate('created_at', '<=', $akhir)->orderBy('created_at', 'desc')
            ->join('siswas', 'id_siswa', '=', 'siswas.id')->paginate(8);

            // $profil = User::select('name','level')->where('level', '=', 1)->first();
            return view('a_laporan.index', compact('lapstok', 'profil','tanggal'));
        }catch(\Exception $e){
            return redirect()->back();
        }
    }
    public function cetakLaporanNilai($dari, $sampai)
    {
        // dd(["Tanggal Awal: ".$dari, "Tanggal Akhir" .$sampai]);
        $resultPerTanggal = Penilaian::with('sisnilai')->whereBetween('tanggal',[$dari, $sampai])->get();
        // dd($resultPerTanggal);
        return view('a_laporan.cetak', compact('resultPerTanggal'));
    }

    public function cetakLaporan($id)
    {
        // dd(["Tanggal Awal: ".$dari, "Tanggal Akhir" .$sampai]);
        $resultPerTanggal = Penilaian::with('sisnilai')->where('id',$id)->get();
        // dd($resultPerTanggal);
        return view('a_laporan.cetak_id', compact('resultPerTanggal'));
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
            'kealian' => 'rqquired',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $pendidik = Pendidik::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'keahlian' => $request->keahlian,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);
        $u_pendidik = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
            'role' => 2,
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
            // 'no_hp' => 'required',
        ]);

        $pendidik = Pendidik::find($id);
        $pendidik->nik = $request->get('nik');
        $pendidik->nama = $request->get('nama');
        $pendidik->jenis_kelamin = $request->get('jk');
        $pendidik->email = $request->get('email');
        // $pendidik->no_hp = $request->get('no_hp');
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
        // $user = User::findorfail($id);
        $email = $pendidik->email;
        $user = User::where('email' , $email)->delete();
        $pendidik->delete();
        // $user->delete();
        return redirect('m_pendidik')->with('deleted', 'Data berhasil dihapus');
    }
}
