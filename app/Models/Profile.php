<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile'; // ← pakai nama tabel yang benar

    protected $fillable = ['judul', 'isi', 'created_at']; // opsional, buat mass assignment
}
