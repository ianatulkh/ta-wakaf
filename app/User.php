<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\Traits\SaveToUpper;
use App\Wakif;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SaveToUpper;

    protected $no_upper = [
        'id_role', 'email', 'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_role', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function wakif()
    {
        return $this->hasOne(Wakif::class, 'id_user');
    }

    public function hasRole($role)
    {
        if ($this->role()->where('nama_role', $role)->first()) {
            return true;
        }

        return false;
    }

    public function adminlte_image()
    {
        return asset('homepage/images/avatar.png');
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
