<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Permohonan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $siswas = Siswa::where('user_id', Auth::user()->id)->first();
        $jurusans = Jurusan::all();
        $perusahaans = Perusahaan::paginate(9);
        $permohonans = Permohonan::all();
        // $perusahaans = Perusahaan::join('permohonans', 'perusahaans.id', '=', 'permohonans.perusahaan_id')->get();


        return view('pages.siswa.index', compact('users', 'siswas', 'jurusans', 'perusahaans', 'permohonans'));
    }

    public function index_hasil_pendaftaran_siswa()
    {
        $siswas = Siswa::where('user_id', Auth::user()->id)->first();
        $penerimaans = Penerimaan::all();

        return view('pages.siswa.hasil_pendaftaran', compact('siswas', 'penerimaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Auth::user()->id);
        $jurusans = Jurusan::all();
        return view('pages.siswa.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'nama' => $validatedData['nama'],
            'kelas' => $validatedData['kelas'],
            'jurusan_id' => $request->jurusan,
            'user_id' => Auth::user()->id,
            // 'user_id' => auth()->user()->id,
        ]);

        return redirect()->to('/dashboard')->with('success', 'Data anda berhasil disimpan.');
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
