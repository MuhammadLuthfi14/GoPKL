<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'siswa',
            'guru',
            'perusahaan',
            'admin',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
