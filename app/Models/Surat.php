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

    public function isiFormatted(): string
{
    $isi = $this->jenis->isi;
    foreach ($this->detail_map as $key => $value) {
        $isi = str_replace('{' . $key . '}', $value, $isi);
    }
    return $isi;
}

}
