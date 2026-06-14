<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // User Management
            'setup.users.index',
            'setup.users.show',
            'setup.users.create',
            'setup.users.store',
            'setup.users.edit',
            'setup.users.update',
            'setup.users.destroy',

            // Role Management
            'setup.roles.index',
            'setup.roles.create',
            'setup.roles.store',
            'setup.roles.edit',
            'setup.roles.update',
            'setup.roles.destroy',

            // Permission Management
            'setup.permissions.index',
            'setup.permissions.create',
            'setup.permissions.store',
            'setup.permissions.edit',
            'setup.permissions.update',
            'setup.permissions.destroy',

            // Presensi Admin
            'presensis.admin.index',
            'presensis.admin.show',
            'presensis.admin.create',
            'presensis.admin.store',
            'presensis.admin.edit',
            'presensis.admin.update',
            'presensis.admin.destroy',

            // Presensi Pegawai
            'presensis.pegawai.index',
            'presensis.pegawai.show',
            'presensis.pegawai.create',
            'presensis.pegawai.store',
            'presensis.pegawai.edit',
            'presensis.pegawai.update',
            'presensis.pegawai.destroy',

            // Logbook
            'logbook.index',
            'logbook.show',
            'logbook.create',
            'logbook.store',
            'logbook.edit',
            'logbook.update',
            'logbook.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
