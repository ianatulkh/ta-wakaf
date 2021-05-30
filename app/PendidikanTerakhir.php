<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendidikanTerakhir extends Model
{
    protected $table = 'pendidikan_terakhir';
    public $timestamps = false;

    protected $fillable = [
        'tingkat'
    ];

    public function wakif()
    {
        return $this->hasMany(Wakif::class, 'id_pendidikan_terakhir');
    }
}
