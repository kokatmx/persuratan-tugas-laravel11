<h1>Edit Surat</h1>
<form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="no_surat">No Surat:</label>
    <input type="text" name="no_surat" id="no_surat" value="{{ $surat->no_surat }}" required>
    <label for="nim">NIM:</label>
    <select name="nim" id="nim" required>
        @foreach ($mahasiswas as $mahasiswa)
            <option value="{{ $mahasiswa->nim }}" @if ($mahasiswa->nim == $surat->nim) selected @endif>
                {{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</option>
        @endforeach
    </select>
    <label for="jenis_surat">Jenis Surat:</label>
    <select name="jenis_surat" id="jenis_surat" required>
        <option value="izin" @if ($surat->jenis_surat == 'izin') selected @endif>Izin</option>
        <option value="sakit" @if ($surat->jenis_surat == 'sakit') selected @endif>Sakit</option>
        <option value="disposisi" @if ($surat->jenis_surat == 'disposisi') selected @endif>Disposisi</option>
    </select>
    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="diproses" @if ($surat->status == 'diproses') selected @endif>Diproses</option>
        <option value="diterima" @if ($surat->status == 'diterima') selected @endif>Diterima</option>
        <option value="ditolak" @if ($surat->status == 'ditolak') selected @endif>Ditolak</option>
    </select>
    <label for="file_surat">File Surat:</label>
    <input type="file" name="file_surat" id="file_surat">
    <button type="submit">Update</button>
</form>
