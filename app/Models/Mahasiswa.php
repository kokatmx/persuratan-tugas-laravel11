<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // ini tak tambahkan sendiri
    protected $fillable = [
        'nim', 'nama', 'jurusan'
    ];

    use HasFactory;
}
