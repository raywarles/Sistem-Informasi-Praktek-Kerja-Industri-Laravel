<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $fillable = ['prakerin_id','keterangan','laporan',];

    public function prakerin()
    {
        return $this->belongsTo('App\Siswa')->withDefault();
    }
}
