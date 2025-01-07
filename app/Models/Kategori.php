<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar'
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
    public function acaras()
    {
        return $this->hasMany(Acara::class);
    }
}
