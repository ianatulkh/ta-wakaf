<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktaIkrar extends Model
{
    protected $table = 'akta_ikrar';

    protected $fillable = [
        'id_berkas_wakif',
        'nomor',
        'wakif_jabatan',
        'wakif_bertindak',
        'nadzir_jabatan',
        'nadzir_bertindak',
        'status_hak_nomor',
        'atas_hak_nomor',
        'atas_hak_lain',
        'luas',
        'batas_timur',
        'batas_barat',
        'batas_utara',
        'batas_selatan',
        'id_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'keperluan'
    ];

    public function berkasWakif() 
    {
        return $this->belongsTo(BerkasWakif::class, 'id_berkas_wakif');
    }

    public function saksiIrar()
    {
        return $this->hasMany(SaksiIkrar::class, 'id_akta_ikrar');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}