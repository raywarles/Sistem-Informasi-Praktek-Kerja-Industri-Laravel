<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $fillable = [
        'user_id', 'nip', 'jk','nope',
    ];
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    public function prakerin()
    {
        # code...
        return $this->hasMany(Prakerin::class)->withDefault();
    }
}
