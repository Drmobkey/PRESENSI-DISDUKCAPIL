<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $presensis = Presensi::paginate(10);
        $users = User::paginate(10);
        return view('admin.presensi.index', compact('presensis', 'users'));
    }

    public function create()
    {
        $presensis = Presensi::all();
        return view('admin.presensi.create', compact('presensis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
        ]);

        Presensi::create($request->all());

        return redirect('presensis')->with('success', 'Presensi berhasil ditambahkan');
    }

    public function edit(Presensi $presensi)
    {
        // Tampilkan formulir untuk mengedit presensi
        return view('presensis.edit', compact('presensi'));
    }

    public function update(Request $request, Presensi $presensi)
    {
        // Validasi input dari formulir
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            // Tambahkan validasi untuk kolom-kolom lainnya
        ]);

        // Update data presensi di database
        $presensi->update($request->all());

        return redirect()->route('presensis.index')->with('success', 'Presensi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        // Hapus data presensi dari database
        $presensi->delete();

        return redirect('presensis')->with('success', 'Presensi berhasil dihapus');
    }
}
