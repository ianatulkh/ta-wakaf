<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wakif;

class Agama extends Model
{
    protected $table = 'agama';
    public $timestamps = false;

    protected $fillable = [
        'agama'
    ];

    public function wakif()
    {
        return $this->hasMany(Wakif::class, 'id_agama');
    }
}
