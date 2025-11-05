<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{

    protected $table = 'galery'; // ← pakai nama tabel yang benar

    protected $fillable = ['post_id', 'position', 'status'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, 'galery_id');
    }

}
