<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Penilaian;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::select('siswas.id','nik','nama','jenis_kelamin.gender','email','no_hp')
            ->join('jenis_kelamin', 'jenis_kelamin', '=', 'jenis_kelamin.id')->paginate(12);
        return view('m_siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m_siswa.create');
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
            'nik' => 'required|string|max:16',
            'nama' => 'required|string',
            'jk' => 'required',
            'email' => 'required',
            'no_telp' => 'required|string|max:13',
            'password' => 'required',
        ]);

        $siswa = Siswa::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'email' => $request->email,
            'no_hp' => $request->no_telp,
        ]);
        $u_siswa = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
            'role' => 3,
        ]);
        $siswa->save();

        return redirect('m_siswa')->with('created', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findorfail($id);

        return view('m_siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findorfail($id);
        $genders = Gender::all();

        return view('m_siswa.edit', compact('siswa','genders'));
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
            'nik' => 'required|string|max:16',
            'nama' => 'required|string',
            'jk' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        $siswa = Siswa::find($id);
        $siswa->nik = $request->get('nik');
        $siswa->nama = $request->get('nama');
        $siswa->jenis_kelamin = $request->get('jk');
        $siswa->email = $request->get('email');
        $siswa->no_hp = $request->get('no_hp');
        $siswa->save();

        return redirect('m_siswa')->with('updated', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findorfail($id);
        $email = $siswa->email;
        $user = User::where('email' , $email)->delete();
        
        $siswa->delete();
        // $user->delete();
        

        return redirect('m_siswa')->with('deleted', 'Data berhasil dihapus!');
    }
    public function index_laporan()
    {
        $idsiswa = Siswa::select('id','email')->where('email','=',Auth::user()->email)->first();
        $laporan = Penilaian::select('penilaians.id','id_siswa','siswas.nama','tema_praktek','nilai_kreatif','nilai_ketrampilan','nilai_sikap')
            ->where('id_siswa','=',$idsiswa->id)
            ->join('siswas', 'id_siswa', '=', 'siswas.id')->paginate(12);
            // dd($laporan);
        return view('u_siswa.s_laporan.index', compact('laporan'));
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
            return view('u_siswa.s_laporan.index', compact('lapstok', 'profil','tanggal'));
        }catch(\Exception $e){
            return redirect()->back();
        }
    }
    public function cetakLaporanNilai($dari, $sampai)
    {
        // dd(["Tanggal Awal: ".$dari, "Tanggal Akhir" .$sampai]);
        $resultPerTanggal = Penilaian::with('sisnilai')->whereBetween('tanggal',[$dari, $sampai])->get();
        // dd($resultPerTanggal);
        return view('u_siswa.s_laporan.cetak', compact('resultPerTanggal'));
    }
}
