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
        $presensis = Presensi::paginate(10);
        $users = User::paginate(10);
        return view('pegawai.presensi.index', compact('presensis', 'users'));
    }
    
}
