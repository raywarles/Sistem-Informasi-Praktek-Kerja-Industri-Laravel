<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password','level','avatar',
    ];

    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gurunya()
    {
        # code...
        return $this->hasOne(Guru::class)->withDefault();
    }
    public function siswa()
    {
        # code...
        return $this->hasOne(Siswa::class)->withDefault();
    }
    public function industri()
    {
        # code...
        return $this->hasOne(Industri::class)->withDefault();
    }
    public function panitia()
    {
        # code...
        return $this->hasOne(Panitia::class)->withDefault();
    }
    public function getAvatar()
    {
        return asset('back_asset/img/avatar/'.$this->avatar);
    }
}
