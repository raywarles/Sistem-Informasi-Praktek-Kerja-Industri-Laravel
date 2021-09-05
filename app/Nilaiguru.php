<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaiguru extends Model
{
    //
    protected $fillable = ['prakerin_id','afektif','kognitif','psikomotor','rerata',];
    public function prakerin()
    {
        return $this->belongsTo('App\prakerin')->withDefault();
    }
}
