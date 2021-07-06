<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BerkasWakifSaksi extends Model
{
    protected $table = 'berkas_wakif_saksi';
    
    protected $fillable = [
        'id_berkas_wakif', 'id_saksi'
    ];
}
