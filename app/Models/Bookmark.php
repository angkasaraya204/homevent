<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    protected $fillable = [
        'user_id', 
        'acara_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}
