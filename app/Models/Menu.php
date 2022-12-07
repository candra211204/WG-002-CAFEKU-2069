<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Proteksi data id 
    protected $guarded = ['id'];

    // Relasi ke tabel kategori
    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
}
