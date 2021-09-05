<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    //
    protected $dates = ['tgl_masuk','tgl_keluar'];
    protected $fillable = [
        'siswa_id', 'guru_id', 'industri_id','periode_id','tgl_masuk','tgl_keluar','status_prakerin','sertifikat',
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa')->withDefault();
    }

    public function industri()
    {
        return $this->belongsTo('App\Industri')->withDefault();
    }
    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }
    public function periode()
    {
        return $this->belongsTo('App\Periode')->withDefault();
    }
    public function laporan()
    {
        # code...
        return $this->hasOne(Laporan::class)->withDefault();
    }
    public function nilaiindustri()
    {
        # code...
        return $this->hasOne(Nilaiindustri::class)->withDefault();
    }
    public function nilaiguru()
    {
        # code...
        return $this->hasOne(Nilaiguru::class)->withDefault();
    }
    public function absen()
    {
        return $this->hasMany(Absen::class)->withDefault();
    }
}
