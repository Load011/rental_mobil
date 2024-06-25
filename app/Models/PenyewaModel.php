<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaModel extends Model
{
    use HasFactory;

    protected $table = "m_penyewa";

    protected $fillable = [
        'nama_penyewa',
        'no_ktp',
        'no_tlp',
        'alamat_penyewa'
    ];
}
