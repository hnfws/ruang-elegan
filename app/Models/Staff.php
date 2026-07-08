<?php

namespace App\Models;

// WAJIB: Ganti import Eloquent Model bawaan dengan Authenticatable dari foundation Auth
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    
    // Matikan timestamps karena tabel staff Anda di database tidak memiliki kolom created_at & updated_at
    public $timestamps = false; 

    protected $fillable = [
        'nama', 
        'email', 
        'password', 
        'no_hp', 
        'role'
    ];
}