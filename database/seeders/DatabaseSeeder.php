<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);

        $roles = Role::all();

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123'),
        ]);
        $adminUser->assignRole($roles->where('name', 'admin')->first());

        for ($i = 1; $i <= 30; $i++) {
            User::create([
                'name' => 'siswa' . $i,
                'email' => 'siswa' . $i . '@gmail.com',
                'password' => bcrypt('123'),
            ]);
        }
        $siswaUsers = User::whereIn('id', range(2, 31))->get();

        foreach ($siswaUsers as $user) {
            $user->assignRole('siswa');
        }

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'guru' . $i,
                'email' => 'guru' . $i . '@gmail.com',
                'password' => bcrypt('123'),
            ]);
        }
        $guruUsers = User::whereIn('id', range(32, 41))->get();

        foreach ($guruUsers as $user) {
            $user->assignRole('guru');
        }

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'perusahaan' . $i,
                'email' => 'perusahaan' . $i . '@gmail.com',
                'password' => bcrypt('123'),
            ]);
        }
        $perusahaanUsers = User::whereIn('id', range(42, 51))->get();

        foreach ($perusahaanUsers as $user) {
            $user->assignRole('perusahaan');
        }

        $this->call(JurusanSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(PersyaratanSeeder::class);
    }
}
