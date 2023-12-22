<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $fillable = ['pembimbing_id', 'perusahaan_id', 'keterangan', 'status'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('pembimbing', function ($query) use ($search) {
                    $query->whereHas('permohonan', function ($query) use ($search) {
                        $query->where('tgl_masuk', 'like', '%' . $search . '%')
                            ->orWhere('tgl_keluar', 'like', '%' . $search . '%')
                            ->orWhere('durasi_pkl', 'like', '%' . $search . '%')
                            ->orWhereHas('siswa', function ($query) use ($search) {
                                $query->where('nama', 'like', '%' . $search . '%')
                                    ->orWhere('kelas', 'like', '%' . $search . '%')
                                    ->orWhereHas('jurusan', function ($query) use ($search) {
                                        $query->where('nama', 'like', '%' . $search . '%')
                                            ->orWhere('singkatan', 'like', '%' . $search . '%');
                                    });
                            })
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('name', 'like', '%' . $search . '%')
                                    ->orWhere('email', 'like', '%' . $search . '%');
                            })
                            ->orWhereHas('perusahaan', function ($query) use ($search) {
                                $query->where('nama', 'like', '%' . $search . '%')
                                    ->orWhere('jurusan', 'like', '%' . $search . '%')
                                    ->orWhere('alamat', 'like', '%' . $search . '%')
                                    ->orWhereHas('user', function ($query) use ($search) {
                                        $query->where('name', 'like', '%' . $search . '%')
                                            ->orWhere('email', 'like', '%' . $search . '%');
                                    });
                            });
                    });
                })
                    ->orWhereHas('perusahaan', function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('jurusan', 'like', '%' . $search . '%')
                            ->orWhere('alamat', 'like', '%' . $search . '%')
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('name', 'like', '%' . $search . '%')
                                    ->orWhere('email', 'like', '%' . $search . '%');
                            });
                    });
            });
        });
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'pembimbing_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }
}
