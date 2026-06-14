<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class PresensiPegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = auth()->id();
        $today = now()->toDateString();

        $presensis = Presensi::where('user_id', $userId)->paginate(10);
        $users = User::paginate(10);
        
        $konfigurasi = \App\Models\Konfigurasi::first();
        $presensiHariIni = Presensi::where('user_id', $userId)
            ->whereDate('tanggal', $today)
            ->get();

        return view('pegawai.presensi.index', compact('presensis', 'users', 'konfigurasi', 'presensiHariIni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string',
        ]);

        $userId = auth()->id();
        $today = now()->toDateString();
        $timeNow = now()->toTimeString();

        // Cari data presensi hari ini
        $presensi = Presensi::where('user_id', $userId)
            ->whereDate('tanggal', $today)
            ->first();

        if (!$presensi) {
            // Absen Masuk
            Presensi::create([
                'user_id' => $userId,
                'tanggal' => $today,
                'lokasi' => $request->lokasi,
                'jam_masuk' => $timeNow,
                'status' => 'belum di acc',
            ]);

            return redirect()->back()->with('success', 'Absen Masuk berhasil dicatat.');
        } elseif (!$presensi->jam_pulang) {
            // Absen Pulang
            $presensi->update([
                'jam_pulang' => $timeNow,
                'lokasi' => $request->lokasi, // perbarui lokasi terkini saat absen pulang
            ]);

            return redirect()->back()->with('success', 'Absen Pulang berhasil dicatat.');
        }

        return redirect()->back()->with('error', 'Anda sudah melakukan absen masuk dan pulang hari ini.');
    }
    
}
