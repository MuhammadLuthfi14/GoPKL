<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'kelas', 'jurusan_id', 'status'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['search']), function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhereHas('jurusan', function ($query) use ($search) {
                    $query->where('nama', 'like', '%' . $search . '%');
                    $query->where('singkatan', 'like', '%' . $search . '%');
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                });
        });
    }


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permohonan()
    {
        return $this->hasMany(Permohonan::class, 'permohonan_id');
    }
}
