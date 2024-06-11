<?php

namespace App\Http\Controllers\Admin;

use App\Models\Surat;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::with('mahasiswa')->get();
        return view('surats.index', compact('surats'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        return view('surats.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required',
            'nim' => 'required|exists:mahasiswas,nim',
            'jenis_surat' => 'required|in:izin,sakit,disposisi',
            'status' => 'required|in:diproses,diterima,ditolak',
            'file_surat' => 'nullable|file',
        ]);

        if ($request->hasFile('file_surat')) {
            $path = $request->file('file_surat')->store('surat_files');
            $validated['file_surat'] = $path;
        }

        Surat::create($validated);

        return redirect()->route('surats.index')->with('success', 'Surat created successfully');
    }

    public function show($id)
    {
        $surat = Surat::with('mahasiswa')->findOrFail($id);
        return view('surats.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        return view('surats.edit', compact('surat', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_surat' => 'required',
            'nim' => 'required|exists:mahasiswas,nim',
            'jenis_surat' => 'required|in:izin,sakit,disposisi',
            'status' => 'required|in:diproses,diterima,ditolak',
            'file_surat' => 'nullable|file',
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $path = $request->file('file_surat')->store('surat_files');
            $validated['file_surat'] = $path;
        }

        $surat->update($validated);

        return redirect()->route('surats.index')->with('success', 'Surat updated successfully');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surats.index')->with('success', 'Surat deleted successfully');
    }
}
