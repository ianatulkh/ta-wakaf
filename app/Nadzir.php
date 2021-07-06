<?php

namespace App;

use App\Traits\SaveToUpper;
use Illuminate\Database\Eloquent\Model;

class Nadzir extends Model
{
    use SaveToUpper;

    protected $table = 'nadzir';

    protected $no_upper = [
        'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];

    protected $fillable = [
        'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi', 'ktp'
    ];
    
    public function berkasWakif()
    {
        return $this->belongsToMany(BerkasWakif::class, 'berkas_wakif_nadzir', 'id_nadzir', 'id_berkas_wakif')
                    ->withPivot('jabatan', 'nama_badan_hukum_organisasi', 'no_akta_notaris', 'sekretaris', 'bendahara');
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
