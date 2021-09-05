<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use App\Surat;
use App\User;
use App\Industri;
use App\Guru;
use App\Prakerin;
use App\Laporan;
use Session;
use Redirect;
use App\Nilaiindustri;
use App\Nilaiguru;
class NilaiController extends Controller
{
    //
    public function nilaiIndustri(Request $request)
    {
    	$jumlah = array_sum($request->all());
    	$rata = $jumlah / 14;
    	$request->request->add(['rerata' => $rata]);
    	$baru = Nilaiindustri::create($request->all());
    	 return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
    }
    public function updateIndustri(Request $request)
    {
    	# code...
    	$data = Nilaiindustri::find($request->prakerin_id);
    	$jumlah = array_sum($request->all());
    	$rata = $jumlah / 14;
    	$request->request->add(['rerata' => $rata]);

    	$data->update($request->all());
    	 return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
    }
    public function nilaiGuru(Request $request)
    {
    	$jumlah = array_sum($request->all());
    	$rata = $jumlah / 3;
    	$request->request->add(['rerata' => $rata]);
    	$baru = Nilaiguru::create($request->all());
    	 return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
    }
    public function updateGuru(Request $request)
    {
    	# code...
    	$data = Nilaiguru::find($request->prakerin_id);
    	$jumlah = array_sum($request->all());
    	$rata = $jumlah / 3;
    	$request->request->add(['rerata' => $rata]);

    	$data->update($request->all());
    	 return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
    }
}
