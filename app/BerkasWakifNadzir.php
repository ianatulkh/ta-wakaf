<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BerkasWakifNadzir extends Model
{
    protected $table = 'berkas_wakif_nadzir';
    public $timestamps = false;
    
    protected $fillable = [
        'id_berkas_wakif', 
        'id_nadzir',
        'jabatan',
        'nama_badan_hukum_organisasi',
        'no_akta_notaris',
        'sekretaris',
        'bendahara',
    ];

}
