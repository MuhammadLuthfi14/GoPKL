<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;

    protected $fillable = ['permohonan_id', 'guru_id', 'perusahaan_id', 'status', 'status_penerimaan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
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
                })
                    ->orWhereHas('guru', function ($query) use ($search) {
                        $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhereHas('jabatan', function ($query) use ($search) {
                                $query->where('nama', 'like', '%' . $search . '%');
                            })
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('name', 'like', '%' . $search . '%')
                                    ->orWhere('email', 'like', '%' . $search . '%');
                            });
                    });
            });
        });
    }

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function penerimaan()
    {
        return $this->hasOne(Penerimaan::class, 'pembimbing_id');
    }
}
