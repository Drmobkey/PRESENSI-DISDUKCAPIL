<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.setup.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        return view('admin.setup.permission.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name|max:255',
        ]);

        Permission::create(['name' => strtolower(trim($request->name))]);

        return redirect()->route('permissions.index')->with('success', 'Permission baru berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.setup.permission.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update(['name' => strtolower(trim($request->name))]);

        return redirect()->route('permissions.index')->with('success', 'Permission berhasil diubah.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('danger', 'Permission berhasil dihapus.');
    }
}
