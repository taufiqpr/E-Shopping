<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model {
    use HasFactory;
    protected $table = 'kriteria';

    // Specify the primary key
    protected $primaryKey = 'id';

    // Specify which attributes are mass assignable
    protected $fillable = ['kode', 'nama', 'bobot'];

    // Enable timestamps (created_at and updated_at will be managed automatically)
    public $timestamps = true;
}

