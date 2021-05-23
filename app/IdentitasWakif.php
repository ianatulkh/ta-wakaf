<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BerkasWakif;

class IdentitasWakif extends Model
{
    protected $table = 'identitas_wakif';
    protected $fillable = [
        'nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pendidikan_terakhir', 'pekerjaan', 'kewarganegaraan', 'alamat_singkat', 'desa_kel', 'rt_rw', 'kecamatan', 'kabupaten', 'provinsi', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function berkasWakif()
    {
        return $this->hasMany(BerkasWakif::class, 'id_wakif');
    }
}
