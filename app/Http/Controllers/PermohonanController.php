<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'durasi_pkl' => 'required',
        ]);

        $siswa = Siswa::where('user_id', auth()->user()->id)->first();
        $perusahaan = Perusahaan::where('id', $request->perusahaan_id)->first();

        if ($siswa && $perusahaan) {
            Permohonan::create([
                'siswa_id' => $siswa->id,
                'perusahaan_id' => $perusahaan->id,
                'tgl_mulai' => $validatedData['tgl_mulai'],
                'tgl_selesai' => $validatedData['tgl_selesai'],
                'durasi_pkl' => $validatedData['durasi_pkl'],
            ]);

            return redirect()->route('siswa.index')->with('success', 'Permohonan PKL Anda telah berhasil diajukan.');
        }

        return redirect()->route('siswa.index')->with('error', 'Data siswa atau perusahaan tidak ditemukan.');
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
    public function update(Request $request, Permohonan $permohonan)
    {
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
