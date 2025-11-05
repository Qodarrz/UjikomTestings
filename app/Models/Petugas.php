<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Penting: gunakan Authenticatable
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
