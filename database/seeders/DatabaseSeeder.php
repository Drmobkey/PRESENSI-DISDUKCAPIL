<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Jalankan Seeder Hak Akses, Peran, dan Akun secara terpisah
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        // 2. Buat Konfigurasi Default
        \App\Models\Konfigurasi::updateOrCreate(
            ['id' => 1],
            [
                'status_presensi' => 'buka',
                'jam_buka' => '07:00:00',
                'jam_tutup' => '17:00:00',
            ]
        );

        // 3. Buat Akun Dummy Pegawai Tambahan & Logbook
        $dummyUsers = \App\Models\User::factory(5)->create();
        foreach ($dummyUsers as $user) {
            $user->assignRole('pegawai');
        }

        \App\Models\Logbook::factory(20)->create();
    }
}
