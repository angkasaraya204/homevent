<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $table = 'tentangkami';
    protected $fillable = [
        'logo',
        'deskripsi'
    ];
}
