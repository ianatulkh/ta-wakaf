<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wakif;
use App\Status;
use App\Traits\SaveToUpper;

class BerkasWakif extends Model
{
    use SaveToUpper;
    
    protected $table = 'berkas_wakif';

    protected $no_upper = [
        'id_wakif', 
        'sertifikat_tanah', 
        'sktts', 
        'sppt', 
        'id_status',
        'status_hak_nomor',
        'atas_hak_nomor',
        'atas_hak_lain',
        'luas',
        'batas_timur',
        'batas_barat',
        'batas_utara',
        'batas_selatan',
        'id_desa',
        'rt',
        'rw',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'tahun_diwakafkan',
    ];

    protected $fillable = [
        'id_wakif', 
        'sertifikat_tanah', 
        'sktts', 
        'sppt', 
        'id_status',
        'status_hak_nomor',
        'atas_hak_nomor',
        'atas_hak_lain',
        'luas',
        'batas_timur',
        'batas_barat',
        'batas_utara',
        'batas_selatan',
        'id_desa',
        'rt',
        'rw',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'keperluan',
        'nama_pewasiat',
        'tahun_diwakafkan',
    ];

    public function wakif()
    {
        return $this->belongsTo(Wakif::class, 'id_wakif');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function nadzir()
    {
        return $this->belongsToMany(Nadzir::class, 'berkas_wakif_nadzir', 'id_berkas_wakif', 'id_nadzir')
                    ->withPivot('jabatan', 'nama_badan_hukum_organisasi', 'no_akta_notaris', 'sekretaris', 'bendahara');
    }

    public function saksi()
    {
        return $this->belongsToMany(Saksi::class, 'berkas_wakif_saksi', 'id_berkas_wakif', 'id_saksi');
    }

    public function desStatusBerkas()
    {
        return $this->hasMany(DesStatusBerkas::class, 'id_berkas_wakif');
    }

    public function aktaIkrar()
    {
        return $this->hasOne(AktaIkrar::class, 'id_berkas_wakif');
    }
}
