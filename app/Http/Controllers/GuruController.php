<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Pembimbing;
use App\Models\Permohonan;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $gurus = Guru::where('user_id', Auth::user()->id)->first();
        $perusahaans = Perusahaan::paginate(9);
        $permohonans = Permohonan::all();
        // dd($permohonans);
        $pembimbings = Pembimbing::where('status', null)->get();
        // dd($pembimbings);
        return view('pages.guru.index', compact('users', 'gurus', 'perusahaans', 'permohonans', 'pembimbings'));
    }

    public function index_hasil_pendaftaran_guru()
    {
        $gurus = Guru::where('user_id', Auth::user()->id)->first();
        $pembimbings = Pembimbing::all()->where('status', true);
        $perusahaans = Perusahaan::all();
        return view('pages.guru.hasil-pendaftaran', compact('gurus', 'pembimbings', 'perusahaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        return view('pages.guru.create', compact('jabatans'));
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
            'jabatan' => 'required',
        ]);

        Guru::create([
            'nama' => $validatedData['nama'],
            'jabatan_id' => $request->jabatan,
            'user_id' => Auth::user()->id,
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
