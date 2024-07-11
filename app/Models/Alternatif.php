<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif'; // Nama tabel yang digunakan

    protected $fillable = [
        'nama', 'C1', 'C2', 'C3', 'C4', 'C5', 'created_at', 'updated_at'
    ];

    // Tambahkan kode untuk menonaktifkan incrementing jika id bukan auto increment
    public $incrementing = false;
}

