<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratLogs extends Model
{
    protected $fillable = [
        'surat_id',
        'status',
        'changed_by',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
