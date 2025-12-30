<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratDetail extends Model
{
    protected $fillable = ['surat_id', 'key', 'value'];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
