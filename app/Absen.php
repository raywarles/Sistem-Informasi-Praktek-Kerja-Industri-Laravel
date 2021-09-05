<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //
    protected $dates = ['tanggal'];
    protected $fillable = ['prakerin_id','siswa_id','industri_id','tanggal','jam_masuk','status_a','jam_keluar','status_b','catatan'];

    public function prakerin()
    {
        return $this->belongsTo('App\Prakerin')->withDefault();
    }
}

