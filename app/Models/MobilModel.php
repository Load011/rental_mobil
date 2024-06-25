<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilModel extends Model
{
    use HasFactory;
    
    protected $table = "m_mobil";

    protected $fillable = [
        'nama_mobil',
        'jenis_mobil',
        'plat_mobil',
        'harga_sewa',
    ];
}
