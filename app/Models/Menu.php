<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tabel_menu';
    protected $fillable = [
        'sub_menu',
        'slug_sub_menu',
        'isi_informasi',
    ];
}
