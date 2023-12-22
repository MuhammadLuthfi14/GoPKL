<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'jabatan_id'];

    public function scopeFilter($query, array $filters)
{
    $query->when(isset($filters['search']), function ($query, $search) {
        $query->where(function ($query) use ($search) {
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
}


    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
