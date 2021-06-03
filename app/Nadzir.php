<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nadzir extends Model
{
    protected $table = 'nadzir';

    protected $fillable = [
        'id_berkas_wakif', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];

    public function berkasWakif()
    {
        return $this->belongsTo(Wakif::class, 'id_berkas_wakif');
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
