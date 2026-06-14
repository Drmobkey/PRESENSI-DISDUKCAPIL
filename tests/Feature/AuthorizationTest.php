<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed Spatie roles/permissions and users
        $this->seed(PermissionSeeder::class);
        $this->seed(RoleSeeder::class);
        $this->seed(UserSeeder::class);
    }

    public function test_superadmin_can_access_all_setup_endpoints()
    {
        $superadmin = User::where('email', 'superadmin@example.com')->first();

        $this->actingAs($superadmin);

        $this->get(route('users.index'))->assertStatus(200);
        $this->get(route('roles.index'))->assertStatus(200);
        $this->get(route('permissions.index'))->assertStatus(200);
    }

    public function test_admin_cannot_access_roles_and_permissions()
    {
        $admin = User::where('email', 'admin@example.com')->first();

        $this->actingAs($admin);

        // Can access users
        $this->get(route('users.index'))->assertStatus(200);

        // Cannot access roles or permissions
        $this->get(route('roles.index'))->assertStatus(403);
        $this->get(route('permissions.index'))->assertStatus(403);
    }

    public function test_pegawai_cannot_access_any_setup_endpoints()
    {
        $pegawai = User::where('email', 'pegawai@example.com')->first();

        $this->actingAs($pegawai);

        // Cannot access any admin setup
        $this->get(route('users.index'))->assertStatus(403);
        $this->get(route('roles.index'))->assertStatus(403);
        $this->get(route('permissions.index'))->assertStatus(403);
    }
}
