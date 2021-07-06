<?php

namespace App;

use App\Traits\SaveToUpper;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use SaveToUpper;
    
    protected $table = 'saksi';

    protected $no_upper = [
        'id_akta_ikrar', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];

    protected $fillable = [
        'id_akta_ikrar', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];

    public function berkasWakif()
    {
        return $this->belongsToMany(BerkasWakif::class, 'berkas_wakif_saksi', 'id_saksi', 'id_berkas_wakif');
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
