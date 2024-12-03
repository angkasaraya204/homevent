<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';
    protected $fillable = [
        'nama',
        'gambar',
        'tanggal',
        'genre',
        'link',
        'tempat',
        'deskripsi',
        'status'
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
