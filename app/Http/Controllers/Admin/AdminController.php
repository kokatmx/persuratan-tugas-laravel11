<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Surat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mahasiswa()
    {
        $datas = Mahasiswa::paginate(10);
        return view('mahasiswa', compact('datas'));
    }
    public function dashboard()
    {
        $datas = Surat::with('mahasiswa')->paginate(10);
        return view('admin.dashboard', compact('datas'));
    }
    public function arsipadmin()
    {
        return view('admin.dashboard.arsip.index');
    }
    public function suratmasukadmin()
    {
        return view('admin.dashboard.suratmasuk.index');
    }
    public function suratkeluaradmin()
    {
        return view('admin.dashboard.suratkeluar.index');
    }
    public function analisisadmin()
    {
        return view('admin.dashboard.analisis.index');
    }
}