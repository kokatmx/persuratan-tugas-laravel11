<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Surat extends Model
{
    // ini aku tambahkan sendiri
    protected $fillable = [
        'no_surat', 'nim', 'jenis_surat', 'status', 'file_surat'
    ];
    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'nim', 'nim');
    }
    use HasFactory;
}
