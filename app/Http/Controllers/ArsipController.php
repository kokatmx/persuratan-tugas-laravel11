<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function suratizin()
    {
        $datas = Surat::where('jenis_surat', 'izin')->with('mahasiswa')->paginate(10);
        return view('admin.dashboard.arsip.suratizin.index', compact('datas'));
    }
    public function suratsakit()
    {
        $datas = Surat::where('jenis_surat', 'sakit')->with('mahasiswa')->paginate(10);
        return view('admin.dashboard.arsip.suratsakit.index', compact('datas'));
    }
    public function suratdisposisi()
    {
        $datas = Surat::where('jenis_surat', 'disposisi')->with('mahasiswa')->paginate(10);
        return view('admin.dashboard.arsip.suratdisposisi.index', compact('datas'));
    }
    public function createSurat(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            // 'status' => 'required',
            'nim' => 'required|exists:mahasiswas,nim',
            'file' => 'required|file',
            'jenis_surat' => 'required|in:izin,sakit,disposisi', // Validate jenis_surat
            'status' => 'required|in:diproses,ditolak,diterima', // Validate status
        ]);
        $newSurat = new Surat();
        $newSurat->no_surat = $request->no_surat;
        $newSurat->nim = $request->nim;
        $newSurat->file_surat = "";
        // $newSurat->status = ['izin', 'sakit', 'disposisi'];
        // $newSurat->jenis_surat = ['diproses', 'ditolak', 'diterima'];
        $newSurat->jenis_surat = $request->jenis_surat;
        $newSurat->status = $request->status;
        $newSurat->save();
        $file = $request->file('file');
        $fileName = "suratsakit_" . $newSurat->id . "." . $file->getClientOriginalExtension();
        $file->storeAs('/surat', $fileName, 'public');
        $newSurat->file_surat = $fileName;
        $newSurat->save();
        return redirect()->back()->with('message', 'Surat Berhasil ditambahkan');
    }
    // public function tambahsuratizin(Request $request)
    // {
    //     $request->validate([
    //         'no_surat' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required|exists:mahasiswas,nim',
    //         'status' => 'required',
    //         'file' => 'required|file'
    //     ]);
    //     $newSurat = new Surat();
    //     $newSurat->no_surat = $request->no_surat;
    //     $newSurat->nim = $request->nim;
    //     $newSurat->nama = $request->nama;
    //     $newSurat->status = $request->status;
    //     $newSurat->file_surat = "";
    //     $newSurat->jenis_surat = 'sakit';
    //     $newSurat->save();
    //     $file = $request->file('file');
    //     $fileName = "suratsakit_" . $newSurat->id . "." . $file->getClientOriginalExtension();
    //     $file->storeAs('/surat', $fileName, 'public');
    //     $newSurat->file_surat = $fileName;
    //     $newSurat->save();
    //     return redirect()->back()->with('message', 'Surat Berhasil ditambahkan');
    // }
    // public function tambahsuratdisposisi(Request $request)
    // {
    //     $request->validate([
    //         'no_surat' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required|exists:mahasiswas,nim',
    //         'status' => 'required',
    //         'file' => 'required|file'
    //     ]);
    //     $newSurat = new Surat();
    //     $newSurat->no_surat = $request->no_surat;
    //     $newSurat->nim = $request->nim;
    //     $newSurat->nama = $request->nama;
    //     $newSurat->status = $request->status;
    //     $newSurat->file_surat = "";
    //     $newSurat->jenis_surat = 'sakit';
    //     $newSurat->save();
    //     $file = $request->file('file');
    //     $fileName = "suratsakit_" . $newSurat->id . "." . $file->getClientOriginalExtension();
    //     $file->storeAs('/surat', $fileName, 'public');
    //     $newSurat->file_surat = $fileName;
    //     $newSurat->save();

    //     return redirect()->back()->with('message', 'Surat Berhasil ditambahkan');
    // }

    // public function createSurat(Request $request)
    // {
    //     $request->validate([
    //         'no_surat' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required|exists:mahasiswas,nim',
    //         'status' => 'required',
    //         'jenis_surat' => 'required|in:izin,sakit,disposisi',
    //         'file' => 'required|file'
    //     ]);

    //     $newSurat = new Surat();
    //     $newSurat->no_surat = $request->no_surat;
    //     $newSurat->nim = $request->nim;
    //     $newSurat->nama = $request->nama;
    //     $newSurat->status = $request->status;
    //     $newSurat->jenis_surat = $request->jenis_surat;
    //     $newSurat->save();

    //     $file = $request->file('file');
    //     $fileName = "surat_" . $newSurat->id . "." . $file->getClientOriginalExtension();
    //     $file->storeAs('/surat', $fileName, 'public');
    //     $newSurat->file_surat = $fileName;
    //     $newSurat->save();

    //     return redirect()->back()->with('message', 'Surat Berhasil ditambahkan');
    // }

    public function updateSurat(Request $request, $id)
    {
        // dd("hallo");
        $request->validate([
            'no_surat' => 'required',
            'status' => 'required',
            'jenis_surat' => 'required|in:izin,sakit,disposisi',
            'file' => 'nullable|file'
        ]);

        $surat = Surat::findOrFail($id);
        $surat->no_surat = $request->no_surat;
        $surat->status = $request->status;
        $surat->jenis_surat = $request->jenis_surat;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = "surat_" . $surat->id . "." . $file->getClientOriginalExtension();
            $file->storeAs('/surat', $fileName, 'public');
            $surat->file_surat = $fileName;
        }

        $surat->save();

        return redirect()->back()->with('message', 'Surat Berhasil diupdate');
    }

    public function show($id)
    {
        $surat = Surat::with('mahasiswa')->findOrFail($id);
        return view('admin.dashboard.arsip.suratsakit.show', compact('surat'));
    }


    public function deleteSurat($id)
    {
        $surat = Surat::findOrFail($id);

        // Delete file from storage
        if ($surat->file_surat && Storage::disk('public')->exists('/surat/' . $surat->file_surat)) {
            Storage::disk('public')->delete('/surat/' . $surat->file_surat);
        }

        $surat->delete();

        return redirect()->back()->with('message', 'Surat Berhasil dihapus');
    }
}
