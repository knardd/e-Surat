<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'ttl',
        'jk',
        'agama',
        'pekerjaan',
        'alamat',
        'jenis_id',
        'isi_id',
        'no_surat',
        'tanggal_surat',
        'no_urut',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
