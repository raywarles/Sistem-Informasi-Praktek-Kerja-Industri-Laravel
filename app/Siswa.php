<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $fillable = [
        'user_id', 'nis', 'jk','kelas','jurusan','nope',
    ];
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    public function prakerin()
    {
        # code...
        return $this->hasOne(Prakerin::class)->withDefault();
    }
}
