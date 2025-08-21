<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $query = Karyawan::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('no_id', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%");
            });
        }

        $karyawans = $query->paginate(10);
        $users = User::all();

        if ($request->ajax()) {
            return view('admin.karyawan.table', compact('karyawans', 'users'))->render();
        }
        return view('admin.karyawan.index', compact('karyawans', 'users'));
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        if (!$karyawan) {
            return redirect()->route('admin.karyawan.index')->with('error', 'Karyawan Tidak Ditemukan.');
        }
        return view('admin.karyawan.show', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.user.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_id' => 'nullable',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string|max:15',
            'user_id' => 'required',


        ]);

        Karyawan::create($validatedData);
        return redirect('karyawans')->with('success', 'Data karyawan telah ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id); // Use $karyawan instead of $karyawans
        if (!$karyawan) {
            return redirect()->route('karyawans.index')->with('error', 'Karyawan Tidak Ditemukan.');
        }
        $users = User::all();
        return view('admin.karyawan.edit', compact('karyawan', 'users')); // Pass $karyawan
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string|max:15',
            'user_id' => 'required|exists:users,id'
        ]);


        $karyawan = Karyawan::find($id); // Use $karyawan instead of $karyawans
        if (!$karyawan) {
            return redirect()->route('karyawans.index')->with('error', 'Karyawan Tidak Ditemukan.');
        }
        $karyawan->update($validatedData);
        return redirect('karyawans')->with('success', 'Data karyawan telah diubah.');
    }

    public function destroy($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        $karyawans->delete();
        return redirect('karyawans')->with('danger', 'User  Berhasil Dihapus');
    }

    // public function resetPass($karyawanId)
    // {
    //     // Find the Karyawan record
    //     $karyawan = Karyawan::find($karyawanId);

    //     if (!$karyawan) {
    //         return redirect()->route('karyawans.index')->with('error', 'Karyawan tidak ditemukan.');
    //     }

    //     // Find the related User record
    //     $user = $karyawan->user;

    //     if (!$user) {
    //         return redirect()->route('karyawans.index')->with('error', 'User terkait tidak ditemukan.');
    //     }

    //     // Reset the user's password
    //     $user->password = bcrypt('user123');
    //     $user->save();

    //     // Redirect back with a success message
    //     return redirect()->route('karyawans.index')->with('success', 'Password pengguna berhasil direset menjadi user123.');
    // }
}
