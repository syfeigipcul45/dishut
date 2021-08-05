<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDokumen extends Model
{
    use HasFactory;

    protected $table = 'tabel_kategori_dokumen';
    protected $fillable = [
        'nama_kategori'
    ];
}
