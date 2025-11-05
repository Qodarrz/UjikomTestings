<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts'; // ← pakai nama tabel yang benar

    protected $fillable = ['judul', 'kategori_id', 'isi', 'petugas_id', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function galery()
    {
        return $this->hasMany(Galery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
