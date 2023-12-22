<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->to('/VerifSiswa');
        }
        $a = Siswa::where('user_id', Auth::user()->id)->get();
        $b = Guru::where('user_id', Auth::user()->id)->get();
        $c = Perusahaan::where('user_id', Auth::user()->id)->get();
        if (!$a || !$b || !$c) {
            return redirect()->to('/select-role');
        }
        if ($a || $b || $c) {
            return redirect()->to('/dashboard');
        }
    }
}
