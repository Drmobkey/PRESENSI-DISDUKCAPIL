<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.setup.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        return view('admin.setup.role.create');
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
        ]);

        Role::create(['name' => strtolower(trim($request->name))]);

        return redirect()->route('roles.index')->with('success', 'Role baru berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified role and its permission mapping.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.setup.role.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role in storage (assigning/syncing permissions).
     */
    public function update(Request $request, string $id)
    {
        // Spatie update logic is handled via assignPermission method, but we can redirect or handle here
        return $this->assignPermission($request);
    }

    /**
     * Assign permissions to the role.
     */
    public function assignPermission(Request $request)
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::findByName($request->role);
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Sinkronisasi hak akses untuk role ' . $role->name . ' berhasil.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('danger', 'Role berhasil dihapus.');
    }
}
