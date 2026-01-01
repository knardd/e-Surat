<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'jenis_id',
        'no_surat',
        'tanggal_surat',
        'no_urut',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function details()
    {
        return $this->hasMany(SuratDetail::class);
    }

    public function getDetailMapAttribute()
    {
    $orderedKeys = array_keys(config('surat_fields.' . $this->jenis->slug . '.fields'));

    $details = $this->details()->pluck('value', 'key')->toArray();

    return array_replace(array_flip($orderedKeys), $details);
    }

    public function getDetailPemilikUsahaAttribute()
{
    return collect($this->detail_map)->only([
        'nama',
        'nik',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
    ]);
}
    public function getDetailUsahaAttribute()
{
    return collect($this->detail_map)->only([
        'nama_usaha',
        'jenis_usaha',
        'alamat_usaha',
    ]);
}
    public function getDetailPemohonAttribute()
{
    return collect($this->detail_map)->only([
        'nama_pemohon',
        'nik_pemohon',
        'tempat_tanggal_lahir_pemohon',
        'jenis_kelamin_pemohon',
        'agama_pemohon',
        'pekerjaan_pemohon',
        'alamat_pemohon',
    ]);
}
    public function getDetailAnggotaKeluargaAttribute()
{
    return collect($this->detail_map)->only([
        'nama_anggota_keluarga',
        'nik_anggota_keluarga',
        'tempat_tanggal_lahir_anggota_keluarga',
        'jenis_kelamin_anggota_keluarga',
        'agama_anggota_keluarga',
        'pekerjaan_anggota_keluarga',
        'alamat_anggota_keluarga',
    ]);
}

    public function getDetailBayiAttribute()
{
    return collect($this->detail_map)->only([
        'nama',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
    ]);
}

    public function getDetailOrtuAttribute()
{
    return collect($this->detail_map)->only([
        'nama_ayah',
        'nama_ibu',
        'anak_ke',
    ]);
}

    public function getDetailAlmarhumAttribute()
{
    return collect($this->detail_map)->only([
        'nama',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
    ]);
}

    public function getDetailKematianAttribute()
{
    return collect($this->detail_map)->only([
        'hari_tanggal_kematian',
        'jam',
        'tempat_kematian',
        'sebab_kematian',
    ]);
}

    public function getDetailKepemilikanAttribute()
{
    return collect($this->detail_map)->only([
        'nama',
        'nik',
        'tempat_tanggal_lahir',
        'pekerjaan',
        'alamat',
    ]);
}

    public function isiFormatted()
{
    if (!$this->jenis) {
        return '';
    }

    $detail = $this->detail_map;

    return str_replace(
        ['{alamat_rumah}', '{luas_tanah}', '{luas_bangunan}'],
        [$detail['alamat_rumah'], $detail['luas_tanah'], $detail['luas_bangunan']],
        $this->jenis->isi
    );
}

}
