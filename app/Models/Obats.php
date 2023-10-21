<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obats extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeObat',
        'namaObat',
        'jenisObat',
        'dosisObat',
        'deskripsiObat',
        'satuandosisObat',
        'hargajualObat',
        'hargabeliObat',
        'stokObat',
        'kategoriObat',
        'gambarObat',
        'tanggalkadaluarsaObat',
    ];
}
