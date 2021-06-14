<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';

    protected $fillable = [
        'nama'
    ];

    public function wakif()
    {
        return $this->hasMany(Wakif::class, 'id_desa');
    }

    public function aktaIkrar()
    {
        return $this->hasMany(AktaIkrar::class, 'id_desa');
    }
}
