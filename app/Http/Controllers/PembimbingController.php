<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pembimbing;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function terimaSiswa($id)
    {
        $pembimbings = Pembimbing::find($id);
        $pembimbings->update([
            'status' => true,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data siswa berhasil diterima.');
    }

    public function tolakSiswa($id)
    {
        $pembimbings = Pembimbing::find($id);
        $pembimbings->update([
            'status' => false,
        ]);

        return redirect()->route('guru.index')->with('success', 'Siswa berhasil ditolak.');
    }

    public function hapusSiswa($id)
    {
        $pembimbings = Pembimbing::find($id);
        $pembimbings->delete();

        return redirect()->route('guru.hasil-pendaftaran')->with('success', 'Siswa berhasil dihapus.');
    }

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
        $guru = Guru::where('user_id', auth()->user()->id)->first();
        $permohonan = Permohonan::get();
        // dd($permohonan);

        if ($guru && $permohonan) {


            foreach ($permohonan as $j) {
                Pembimbing::create([
                    'guru_id' => $guru->id,
                    'permohonan_id' => $j->id,
                ]);
            }

            return redirect()->route('guru.index')->with('success', 'Permohonan PKL Anda telah berhasil diajukan.');
        }

        return redirect()->route('guru.index')->with('error', 'Data siswa atau perusahaan tidak ditemukan.');
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
    }
}
