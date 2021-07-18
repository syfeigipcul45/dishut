<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideGambar extends Model
{
    use HasFactory;

    protected $table = 'tabel_slide_gambar';
    protected $fillable = [
        'file_gambar'
    ];
}
