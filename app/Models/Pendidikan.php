<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $primaryKey = 'id_pendidikan';
    protected $fillable = ['nama_kuliah', 'tahun_kuliah', 'deskripsi_kuliah', 'nama_sma', 'tahun_sma', 'deskripsi_sma', 'nama_smp', 'tahun_smp', 'deskripsi_smp', ];
}
