<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('backend.index');
});

Route::get('/dashboard','UserController@dashboard');
//Manajemen User
Route::get('/users','UserController@getUser');
Route::post('/siswa/add','UserController@tambahSiswa');
Route::post('/guru/add','UserController@tambahGuru');
Route::post('/industri/add','UserController@tambahIndustri');
Route::get('/siswa/delete/{id}','UserController@hapusSiswa');
Route::get('/guru/delete/{id}','UserController@hapusGuru');
Route::get('/industri/delete/{id}','UserController@hapusIndustri');
Route::get('/users/profile/{id}','UserController@profile');
Route::get('/users/profile','UserController@profile2');
Route::post('/siswa/update','UserController@updateSiswa');
Route::post('/guru/update','UserController@updateGuru');
Route::post('/users/changepass','UserController@gantiPass');
Route::post('/industri/update','UserController@updateIndustri');

Route::get('/periode','PrakerinController@periode');
Route::post('/periode/add','PrakerinController@tambahPeriode');
Route::get('/periode/delete/{id}','PrakerinController@hapusPeriode');
Route::get('/periode/download/{id}','PrakerinController@filePeriode')->name('getFile');

Route::get('/surat','PrakerinController@surat');
Route::post('/surat/add','PrakerinController@tambahSurat');
Route::get('/surat/delete/{id}','PrakerinController@hapusSurat');
Route::get('/surat/download/{id}','PrakerinController@fileSurat')->name('getFile2');

Route::get('/prakerin','PrakerinController@index');
Route::post('/prakerin/req','PrakerinController@ajukan');
Route::get('/prakerin/status','PrakerinController@status');
Route::post('/prakerin/cetak','PrakerinController@cetak');
Route::post('/prakerin/filter','PrakerinController@filter');
Route::post('/login/process','UserController@login');
Route::get('/logout','UserController@logout');
Route::get('/data-guru','PrakerinController@dataGuru');
Route::get('/data-industri','PrakerinController@dataIndustri');
Route::post('/prakerin/confirm','PrakerinController@panitiaConfirm');
Route::post('/prakerin/accept','PrakerinController@industriAccept');
Route::post('/prakerin/laporan/add','PrakerinController@addLaporan');
Route::get('/laporan/download/{id}','PrakerinController@fileLaporan')->name('getFile3');
Route::get('/sertifikat/download/{id}','PrakerinController@fileSertifikat')->name('getFile4');
Route::post('/prakerin/sertifikat/add','PrakerinController@addSertifikat');


Route::post('/nilai-industri/add','NilaiController@nilaiIndustri');
Route::post('/nilai-industri/update','NilaiController@updateIndustri');
Route::post('/nilai-guru/add','NilaiController@nilaiGuru');
Route::post('/nilai-guru/update','NilaiController@updateGuru');

Route::get('/absensi','PrakerinController@absensi');
Route::get('/absensi/masuk','PrakerinController@masuk');
Route::get('/absensi/keluar','PrakerinController@keluar');
Route::get('/absensi/masuk/confirmasi/{id}','PrakerinController@masukConfirm');
Route::get('/absensi/keluar/confirmasi/{id}','PrakerinController@keluarConfirm');

Route::get('/prakerin/{id}/reject','PrakerinController@reject');

