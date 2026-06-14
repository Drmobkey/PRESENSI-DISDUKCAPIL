<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Superadmin',
                'password' => bcrypt('password'),
                'tanggal_lahir' => '1990-01-01',
                'status' => 'PNS',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
            ]
        );
        $superadmin->syncRoles(['superadmin']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Presensi',
                'password' => bcrypt('password'),
                'tanggal_lahir' => '1992-02-02',
                'status' => 'PNS',
                'jenis_kelamin' => 'Perempuan',
                'telepon' => '081234567891',
            ]
        );
        $admin->syncRoles(['admin']);

        $pegawai = User::firstOrCreate(
            ['email' => 'pegawai@example.com'],
            [
                'name' => 'Pegawai Tester',
                'password' => bcrypt('password'),
                'tanggal_lahir' => '1995-05-05',
                'status' => 'Magang',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567892',
            ]
        );
        $pegawai->syncRoles(['pegawai']);
    }
}
