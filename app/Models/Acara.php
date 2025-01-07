<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';
    protected $fillable = [
        'nama',
        'slug',
        'gambar',
        'tanggal',
        'kategori_id',
        'link',
        'tempat',
        'deskripsi',
        'status'
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
