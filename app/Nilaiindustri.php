<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaiindustri extends Model
{
    //
    protected $fillable = ['prakerin_id','penilaian1','penilaian2','penilaian3','penilaian4','penilaian5','penilaian6','penilaian7','penilaian8','penilaian9','penilaian10','penilaian11','penilaian12','penilaian13','penilaian14','rerata'];

    public function prakerin()
    {
        return $this->belongsTo('App\prakerin')->withDefault();
    }
}
