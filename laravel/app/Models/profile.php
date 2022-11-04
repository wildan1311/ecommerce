<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $table = 'table';

    protected $fillable = 
    [
        'name',
        'alamat',
        'no_hp',
        'username'
    ];
}
