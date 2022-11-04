<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = ['name', 'deskripsi', 'harga', 'jumlah', 'gambar'];
}
