<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BerkasWakif;

class Wakif extends Model
{
    protected $table = 'wakif';
    
    protected $fillable = [
        'id_user', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'id_pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'alamat_singkat', 'id_desa', 'rt', 'rw', 'kecamatan', 'kabupaten', 'provinsi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
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

    public function berkasWakif()
    {
        return $this->hasMany(BerkasWakif::class, 'id_wakif');
    }
}
