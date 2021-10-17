<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $primaryKey = 'id_biodata';
    protected $fillable = ['nama', 'tanggal_lahir', 'no_telepon', 'email', 'website', 'alamat', 'foto',]; 
}
