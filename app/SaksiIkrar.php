<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaksiIkrar extends Model
{
    protected $table = 'saksi_ikrar';

    protected $fillable = [
        'id_akta_ikrar', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];

    public function aktaIkrar()
    {
        return $this->belongsTo(AktaIkrar::class, 'id_akta_ikrar');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    public function pendidikanTerakhir()
    {
        return $this->belongsTo(PendidikanTerakhir::class, 'id_pendidikan_terakhir');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
