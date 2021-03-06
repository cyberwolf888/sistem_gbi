<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN = 1;
    const MEMBER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password', 'isActive', 'type', 'tempat_lahir', 'tgl_lahir'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStatus()
    {
        return $this->isActive == 1 ? 'Aktif' : 'Tidak Aktif';
    }

    public function getJenisKelamin()
    {
        return $this->isActive == 1 ? 'Laki-laki' : 'Perempuan';
    }

}
