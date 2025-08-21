<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Ensure only admin can access
    }

    public function index()
    {
        $userCount = User::count();
        $karyawanCount = Karyawan::count();
        return view('admin.dashboard', compact('userCount', 'karyawanCount'));
    }
}
