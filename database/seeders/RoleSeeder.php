<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $rolePegawai = Role::firstOrCreate(['name' => 'pegawai']);

        // Superadmin has all permissions
        $allPermissions = Permission::all()->pluck('name')->toArray();
        $roleSuperadmin->syncPermissions($allPermissions);

        // Admin permissions
        $roleAdmin->syncPermissions([
            'setup.users.index',
            'setup.users.show',
            'setup.users.create',
            'setup.users.store',
            'setup.users.edit',
            'setup.users.update',
            'setup.users.destroy',
            'presensis.admin.index',
            'presensis.admin.show',
            'presensis.admin.create',
            'presensis.admin.store',
            'presensis.admin.edit',
            'presensis.admin.update',
            'presensis.admin.destroy',
        ]);

        // Pegawai permissions
        $rolePegawai->syncPermissions([
            'presensis.pegawai.index',
            'presensis.pegawai.show',
            'presensis.pegawai.create',
            'presensis.pegawai.store',
            'presensis.pegawai.edit',
            'presensis.pegawai.update',
            'presensis.pegawai.destroy',
            'logbook.index',
            'logbook.show',
            'logbook.create',
            'logbook.store',
            'logbook.edit',
            'logbook.update',
            'logbook.destroy',
        ]);
    }
}
