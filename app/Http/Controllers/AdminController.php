<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jabatan;
use App\Models\Jurusan;
use App\Models\Pembimbing;
use App\Models\Permohonan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_VerifSiswa()
    {
        $siswas =  Siswa::latest()->filter(request(['search']))->get();
        return view('pages.admin.VerifSiswa', compact('siswas'));
    }

    public function index_VerifGuru()
    {
        $gurus = Guru::latest()->filter(request(['search']))->get();
        return view('pages.admin.VerifGuru', compact('gurus'));
    }

    public function index_VerifPerusahaan()
    {
        $perusahaans = Perusahaan::latest()->filter(request(['search']))->get();
        return view('pages.admin.VerifPerusahaan', compact('perusahaans'));
    }

    public function index_siswa()
    {
        $permohonans = Permohonan::latest()->filter(request(['search']))->get();
        $jurusans = Jurusan::all();
        $jurusans = Jurusan::all();
        return view('pages.admin.siswa', compact('permohonans', 'jurusans'));
    }

    public function index_guru()
    {
        $gurus = Guru::latest()->filter(request(['search']))->get();
        $jabatans = Jabatan::all();
        return view('pages.admin.guru', compact('gurus', 'jabatans'));
    }

    public function index_perusahaan()
    {
        $perusahaans = Perusahaan::latest()->filter(request(['search']))->paginate(10);
        return view('pages.admin.perusahaan', compact('perusahaans'));
    }

    public function index_pembimbing()
    {
        $perusahaans = Perusahaan::latest()->filter(request(['search']))->get();
        $gurus = Guru::all();
        $permohonans = Permohonan::all();
        return view('pages.admin.pembimbing', compact('perusahaans', 'gurus', 'permohonans'));
    }


    public function terimasiswa(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->assignRole("siswa");
        return redirect()->to('/VerifSiswa')->with('success', 'Siswa berhasil diverifikasi.');
    }

    public function terimaguru(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->assignRole("guru");
        return redirect()->to('/guru')->with('success', 'Guru berhasil diverifikasi.');
    }

    public function terimaperusahaan(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->assignRole("perusahaan");
        return redirect()->to('/perusahaan')->with('success', 'Perusahaan berhasil diverifikasi.');
    }

    public function updatesiswa(Request $request, $id)
    {
        $permohonan = Permohonan::find($id);
        $siswa = $permohonan->siswa;
        $user = $permohonan->siswa->user;
        $permohonan->update([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'durasi_pkl' => $request->durasi_pkl,
        ]);

        $user->update([
            'email' => $request->email
        ]);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil diubah');
    }

    public function updateguru(Request $request, $id)
    {
        $guru = Guru::find($id);
        $user = $guru->user;

        $user->update([
            'email' => $request->email
        ]);

        $guru->update([
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
        ]);

        return redirect()->to('/guru')->with('success', 'Data siswa berhasil diubah');
    }

    public function updateperusahaan(Request $request, $id)
    {
        $perusahaan = Perusahaan::find($id);
        $user = $perusahaan->user;
        $jurusan = implode(", ", $request->jurusan);

        $user->update([
            'email' => $request->email
        ]);

        $perusahaan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jurusan' => $jurusan,
        ]);

        return redirect()->to('/perusahaan')->with('success', 'Data siswa berhasil diubah');
    }

    public function hapussiswa(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->delete();

        return redirect()->to('/VerifSiswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function hapusguru(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->delete();

        return redirect()->to('/VerifGuru')->with('success', 'Data guru berhasil dihapus.');
    }

    public function hapusperusahaan(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->delete();

        return redirect()->to('/VerifPerusahaan')->with('success', 'Data perusahaan berhasil dihapus.');
    }

    public function daftarpembimbing(Request $request)
    {
        $perusahaan = Perusahaan::find($request->perusahaan_id);
        $permohonans = Permohonan::where('perusahaan_id', $perusahaan->id)->get();

        if ($permohonans->isNotEmpty()) {
            foreach ($permohonans as $permohonan) {
                Pembimbing::create([
                    'permohonan_id' => $permohonan->id,
                    'guru_id' => $request->guru,
                    'perusahaan_id' => $perusahaan->id,
                ]);
            }

            return redirect()->to('/pembimbing')->with('success', 'Data pembimbing berhasil disimpan.');
        }
    }
}
