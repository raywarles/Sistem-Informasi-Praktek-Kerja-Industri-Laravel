<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $fillable = ['periode','deskribsi','dokumen',];

    public function prakerin()
    {
        return $this->hasMany(Prakerin::class)->withDefault();
    }
}
