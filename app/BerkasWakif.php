<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IdentitasWakif;
use App\Status;

class BerkasWakif extends Model
{
    protected $table = 'berkas_wakif';
    protected $fillable = [
        'ktp', 'selfi_ktp', 'id_wakif', 'blanko_tanah', 'id_status'
    ];

    public function identitasWakif()
    {
        return $this->belongsTo(IdentitasWakif::class, 'id_wakif');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
