<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    public $timestamps = false;

    protected $fillable = [
        'nama_role'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
