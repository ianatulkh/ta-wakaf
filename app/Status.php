<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BerkasWakif;

class Status extends Model
{
	protected $table = 'status';
    public $timestamps = false;

    protected $fillable = [
        'status'
    ];

    public function berkasWakif()
    {
        return $this->hasOne(BerkasWakif::class, 'id_status');
    }
}
