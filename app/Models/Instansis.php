<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansis extends Model
{
    protected $fillable = ['name_instansi', 'kecamatan', 'kelurahan', 'alamat', 'logo', 'kabupaten', 'kepala_nama', 'kepala_jabatan', 'kepala_nip', 'ttd_image'];
}
