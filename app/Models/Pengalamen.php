<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalamen extends Model
{
    protected $primaryKey = 'id_pengalamen';
    protected $fillable = ['pengalamen_kerja', 'tahun_pengalamen', 'deskripsi_pengalamen',];
}
