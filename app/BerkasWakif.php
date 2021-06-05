<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wakif;
use App\Status;

class BerkasWakif extends Model
{
    protected $table = 'berkas_wakif';

    protected $fillable = [
        'id_wakif', 'sertifikat_tanah', 'surat_ukur', 'sktts', 'sppt', 'id_status'
    ];

    public function wakif()
    {
        return $this->belongsTo(Wakif::class, 'id_wakif');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function nadzir()
    {
        return $this->hasMany(Nadzir::class, 'id_berkas_wakif');
    }

    public function desStatusBerkas()
    {
        return $this->hasOne(DesStatusBerkas::class, 'id_berkas_wakif');
    }
}
