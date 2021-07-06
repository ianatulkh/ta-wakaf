<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktaIkrar extends Model
{
    protected $table = 'akta_ikrar';

    protected $fillable = [
        'id_berkas_wakif',
        'nomor',
        'nomor_wtk',
        'wakif_jabatan',
        'wakif_bertindak',
        'nadzir_jabatan',
        'nadzir_bertindak',
    ];

    public function berkasWakif() 
    {
        return $this->belongsTo(BerkasWakif::class, 'id_berkas_wakif');
    }
}