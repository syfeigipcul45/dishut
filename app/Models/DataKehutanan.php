<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKehutanan extends Model
{
    use HasFactory;
    protected $table = 'tabel_data_kehutanan';
    protected $fillable = [
        'id-kategori',
        'nama_dokumen',
        'file_dokumen'
    ];
}
