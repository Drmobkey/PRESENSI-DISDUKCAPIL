<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%") // Menggunakan 'name' bukan 'nama' sesuai dengan kolom di tabel users
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%")
                    ->orWhere('no_id', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                    ->orWhere('telepon', 'like', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(10);

        if ($request->ajax()) {
            return view('admin.user.table', compact('users'))->render();
        }
        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User Tidak Ditemukan.');
        }
        return view('admin.user.show', ['user' => $user]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.user.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'nullable',
            'no_id' => 'nullable',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string|max:15',


        ]);

        $tambah_user = new User;
        $tambah_user->name = $request->name;
        $tambah_user->email = $request->email;
        $tambah_user->password = 'user123';
        $tambah_user->role = 'pegawai';
        $tambah_user->no_id = $request->no_id;
        $tambah_user->tanggal_lahir = $request->tanggal_lahir;
        $tambah_user->status = $request->status;
        $tambah_user->jenis_kelamin = $request->jenis_kelamin;
        $tambah_user->telepon = $request->telepon;
        $tambah_user->save();
        return redirect('users')->with('success', 'Data karyawan telah ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Use $user instead of $users
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'no_id' => 'required',
            'role' => 'required',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string|max:15',
        ]);


        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User Tidak Ditemukan.');
        }
        $user->update($validatedData);
        return redirect('admin/users')->with('success', 'Data Pegawai telah diubah.');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('users')->with('danger', 'Pegawai Berhasil Dihapus');
    }

    public function resetPass($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('users')->with('error', 'Pegawai tidak ditemukan.');
        }

        // Reset the user's password
        $user->password = bcrypt('user123');
        $user->save();

        // Redirect back with a success message
        return redirect('users')->with('success', 'Password Pegawai berhasil direset menjadi user123.');
    }
}
