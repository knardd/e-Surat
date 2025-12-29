<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $fillable = ['id', 'name', 'kode', 'isi'];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
