<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wakif;
use App\Status;

class BerkasWakif extends Model
{
    protected $table = 'berkas_wakif';

    protected $fillable = [
        'id_wakif', 'ktp', 'selfi_ktp', 'blanko_tanah', 'id_status'
    ];

    public function wakif()
    {
        return $this->belongsTo(Wakif::class, 'id_wakif');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
