<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesStatusBerkas extends Model
{
    protected $table = 'des_status_berkas';

    protected $fillable = [
        'id_berkas_wakif',
        'ket_review_data',
        'tgl_survey',
        'ket_survey',
        'tgl_ikrar',
        'ket_ikrar',
        'ket_akta_ikrar',
        'ket_ditolak',
    ];

    public function berkasWakif()
    {
        return $this->belongsTo(Wakif::class, 'id_berkas_wakif');
    }
}
