<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Proteksi data id 
    protected $guarded = ['id'];

    // Relasi ke tabel menu
    public function menu() {
        return $this->hasMany(Menu::class);
    }
}
