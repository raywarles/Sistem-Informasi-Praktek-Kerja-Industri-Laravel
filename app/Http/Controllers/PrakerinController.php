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
use App\Absen;
use Session;
use Redirect;
use Carbon\Carbon;
class PrakerinController extends Controller
{
    //
    public function periode()
    {
    	# code...
    	$periods = Periode::all();
    	return view('backend.periode.index',compact('periods'));

    }
    public function tambahPeriode(Request $request)
    {
    	//Simpan Ke Tabel USer
      
      $file = $request->file('dokumen1');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'back_asset/dokumen';
      $file->move($destinationPath,$file->getClientOriginalName());
      $request->request->add(['dokumen' => $nama_file]);
      
      
      $baru = Periode::create($request->all());
      return redirect('/periode')->with('alert','Sukses Menambahkan Data');
    }
    public function hapusPeriode($id)
    {
    	$data = Periode::find($id);
      $data->delete($data);
      return redirect('/periode')->with('sukses','Data Berhasil di Hapus');
    }
    public function filePeriode($id)
    {
    	$dl = Periode::find($id);
       	
        return response()->download("back_asset/dokumen/$dl->dokumen");
    }

    public function surat()
    {
    	# code...
    	$surats = Surat::all();
    	return view('backend.surat.index',compact('surats'));

    }
    public function tambahSurat(Request $request)
    {
    	//Simpan Ke Tabel USer
      $this->validate($request, [
          'dokumen1' => 'required'

      ]);
      $file = $request->file('dokumen1');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'back_asset/dokumen';
      $file->move($destinationPath,$file->getClientOriginalName());
      $request->request->add(['dokumen' => $nama_file]);
      
      
      $baru = Surat::create($request->all());
      return redirect('/surat')->with('alert','Sukses Menambahkan Data');
    }
    public function hapusSurat($id)
    {
    	$data = Surat::find($id);
      $data->delete($data);
      return redirect('/surat')->with('sukses','Data Berhasil di Hapus');
    }
    public function fileSurat($id)
    {
    	$dl = Surat::find($id);
       	
        return response()->download("back_asset/dokumen/$dl->dokumen");
    }
    public function index()
    {
    	# code...
    	if (Session::get('level')=='Siswa') {
    		$id = Session::get('id');
    		$usernya = User::find($id);
    		$data = User::find($id);
    		$cek = Prakerin::where('siswa_id',$usernya->siswa->id)->first();
    		
	    	if (isset($cek)) {
	    			# code...
	    		$stats = 'ADA';
	    		$industris = User::where('level','Industri')->get();
	    		$periodes = Periode::all();

	    		return view('backend.prakerin.index',compact('data','industris','periodes','stats'));
	    	}
	    	else{
	    		$stats = 'TAK ADA';
	    		$industris = User::where('level','Industri')->get();
	    		$periodes = Periode::all();

	    		return view('backend.prakerin.index',compact('data','industris','periodes','stats'));
	    	}	
    	}
    	elseif (Session::get('level')=='Admin') {
    		# code...
    		$gurus = User::where('level','Guru')->get();
    		$prakers = Prakerin::where('status_prakerin','MENUNGGU PERSETUJUAN PANITIA')->get();
    		return view('backend.prakerin.indexAdmin',compact('prakers','gurus'));
    	}
      elseif (Session::get('level')=='Industri') {
        # code...
        
        $prakers = Prakerin::where('status_prakerin','DITERUSKAN KE INDUSTRI')->get();
        return view('backend.prakerin.indexIndustri',compact('prakers'));
      }
    	
    }
    public function ajukan(Request $request)
    {

    	$status = 'MENUNGGU PERSETUJUAN PANITIA';
    	$request->request->add(['status_prakerin' => $status]);
    	$baru = Prakerin::create($request->all());
    	return Redirect::back();
    }
    public function status()
    {
      if (Session::get('level')=='Siswa') {
        # code...
        $id = Session::get('id');
        $usernya = User::find($id);
        $data = User::find($id);
        $cek = Prakerin::where('siswa_id',$usernya->siswa->id)->first();
        
          return view('backend.prakerin.index2',compact('cek','data')); 
      }
      elseif (Session::get('level')=='Industri') {
        # code...
        $id = Session::get('id');
        $usernya = User::find($id);
        $data = User::find($id);
        $ceks = Prakerin::where('industri_id',$usernya->industri->id)->paginate(2);
       

          return view('backend.prakerin.status.index3',compact('ceks')); 
      }
      elseif (Session::get('level')=='Guru') {
        # code...
        $id = Session::get('id');
        $usernya = User::find($id);
        $data = User::find($id);

        $ceks = Prakerin::where('guru_id',$usernya->gurunya->id)->get();
          return view('backend.prakerin.status.index2',compact('ceks','data')); 
      }
      elseif (Session::get('level')=='Admin') {
          $peri = 'ya';
          $ceks = Prakerin::all();
          $periode = Periode::all();
          return view('backend.prakerin.status.index',compact('ceks','periode','peri')); 
      }
    				
    }
    public function filter(Request $request)
    {
          $per = $request->periode;
          $ceks = Prakerin::where('periode_id',$per)->get();
          $periode = Periode::all();
           $peri = $request->periode;
          return view('backend.prakerin.status.index',compact('ceks','periode','peri')); 
      
            
    }
    public function cetak(Request $request){

        $per = $request->peri;

        if ($per == 'ya') {
          $ceks = Prakerin::all();
          $per1 = 'Semua';
          return view('backend.prakerin.status.cetak',compact('ceks','per1')); 
        }
        else{
          $ceks = Prakerin::where('periode_id',$per)->get();
          $per1 = $request->peri;
          return view('backend.prakerin.status.cetak',compact('ceks','per1')); 
        }
        
    }

    public function dataGuru()
    {
    	$datanya = User::where('level','Guru')->get();
    	return view('backend.prakerin.data_guru',compact('datanya'));
    }
    public function dataIndustri()
    {
    	$datanya = User::where('level','Industri')->get();
    	return view('backend.prakerin.data_industri',compact('datanya'));
    }
    public function panitiaConfirm(Request $request)
    {
    	# code...
      $data = Prakerin::find($request->id);
      $status = 'DITERUSKAN KE INDUSTRI';
      $request->request->add(['status_prakerin' => $status]);
      $data->update($request->all());
      return redirect('/prakerin');
    }
    public function industriAccept(Request $request)
    {
      # code...
      $data = Prakerin::find($request->id);
      $status = 'BERJALAN';
      $request->request->add(['status_prakerin' => $status]);
      $data->update($request->all());
      return redirect('/prakerin');
    }
    public function addLaporan(Request $request)
    {
      //Simpan Ke Tabel USer
      $cek = Laporan::where('prakerin_id',$request->prakerin_id)->first();
      if (!isset($cek)) {
          $file = $request->file('laporan1');
   
          // Mendapatkan Nama File
          $nama_file = $file->getClientOriginalName();
       
          // Mendapatkan Extension File
          $extension = $file->getClientOriginalExtension();
      
          // Mendapatkan Ukuran File
          $ukuran_file = $file->getSize();
       
          // Proses Upload File
          $destinationPath = 'back_asset/dokumen';
          $file->move($destinationPath,$file->getClientOriginalName());
          $request->request->add(['laporan' => $nama_file]);
          
          //Simpan Ke Tabel Pengurus
          
          $lapor = Laporan::create($request->all());
          return redirect('/prakerin/status')->with('alert','Sukses Menambahkan Data');
      }
      elseif (isset($cek)) {
          $cek1 = Laporan::find($request->prakerin_id);

          $file = $request->file('laporan1');
   
          // Mendapatkan Nama File
          $nama_file = $file->getClientOriginalName();
       
          // Mendapatkan Extension File
          $extension = $file->getClientOriginalExtension();
      
          // Mendapatkan Ukuran File
          $ukuran_file = $file->getSize();
       
          // Proses Upload File
          $destinationPath = 'back_asset/dokumen';
          $file->move($destinationPath,$file->getClientOriginalName());
          $request->request->add(['laporan' => $nama_file]);
          
          //Simpan Ke Tabel Pengurus
          $cek1->update($request->all());
          
          return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
      } 
     
    }
    public function fileLaporan($id)
    {
        $dl = Laporan::find($id);
        return response()->download("back_asset/dokumen/$dl->laporan");
    }
    public function fileSertifikat($id)
    {
        $dl = Prakerin::find($id);
        return response()->download("back_asset/dokumen/$dl->sertifikat");
    }

    public function addSertifikat(Request $request)
    {
      //Simpan Ke Tabel USer
      $cek1 = Prakerin::find($request->prakerin_id);
      
          $file = $request->file('sertifikat1');
   
          // Mendapatkan Nama File
          $nama_file = $file->getClientOriginalName();
       
          // Mendapatkan Extension File
          $extension = $file->getClientOriginalExtension();
      
          // Mendapatkan Ukuran File
          $ukuran_file = $file->getSize();
       
          // Proses Upload File
          $destinationPath = 'back_asset/dokumen';
          $file->move($destinationPath,$file->getClientOriginalName());
          $request->request->add(['sertifikat' => $nama_file]);
          
          //Simpan Ke Tabel Pengurus

          //Simpan Ke Tabel Pengurus
          $cek1->update($request->all());
          
          return redirect('/prakerin/status')->with('alert','Sukses Mengupdate Data');
    }
    public function absensi()
    {
      if (Session::get('level')=='Siswa') {
        $id = Session::get('id');
        $usernya = User::find($id);

        $absens = Absen::where('prakerin_id',$usernya->siswa->prakerin->id)->get();
        $cek = Prakerin::where('siswa_id',$usernya->siswa->id)->get();
        return view('backend.prakerin.absen',compact('absens','cek'));
      }
      elseif (Session::get('level')=='Industri') {
        $id = Session::get('id');
        $usernya2 = User::find($id);

        $absens = Absen::where('industri_id',$usernya2->industri->id)->get();
        
        return view('backend.prakerin.cekabsen',compact('absens'));
      }
      
    }
    public function masuk(Request $request)
    {
      $id = Session::get('id');
      $usernya = User::find($id);
      $tanggal = Carbon::now('GMT+7');
      $tgl = $tanggal->toDateString();
      $cek = Absen::where('siswa_id',$usernya->siswa->id)->where('tanggal',$tgl)->first();
      $jam_masuk = Carbon::now('GMT+7');
      $jam = $jam_masuk->toTimeString();
  
      if (isset($cek) ) {
       return Redirect::back()->with('alert','Kamu Sudah Absen Hari ini');
      }
      else{
        $status = 'MENUNGGU';
        $request->request->add(['jam_masuk' => $jam]);
        $request->request->add(['status_a' => $status]);
        $request->request->add(['tanggal' => $tgl]);
        $request->request->add(['prakerin_id' => $usernya->siswa->prakerin->id]);
        $request->request->add(['siswa_id' => $usernya->siswa->id]);
        $request->request->add(['industri_id' => $usernya->siswa->prakerin->industri_id]);
        $baru = Absen::create($request->all());
        return Redirect::back();
      }       
    }
    public function keluar(Request $request)
    {
      $id = Session::get('id');
      $usernya = User::find($id);
      $tanggal = Carbon::now('GMT+7');
      $tgl = $tanggal->toDateString();
      $jam_masuk = Carbon::now('GMT+7');
      $jam = $jam_masuk->toTimeString();
      $status = 'MENUNGGU';
      $request->request->add(['jam_keluar' => $jam]);
      $request->request->add(['status_b' => $status]);
      $cek = Absen::where('siswa_id',$usernya->siswa->id)->where('tanggal',$tgl)->first();
      if ($cek->status_b != null ) {
       return Redirect::back()->with('alert','Kamu Sudah Absen Hari ini');
      }
      else{
        $cek->update($request->all());
        $cek->save();
        return Redirect::back();
      }      
    }
    public function masukConfirm(Request $request, $id)
    {
      $data = Absen::find($id);
      $status = 'DIKONFIRMASI';

      $request->request->add(['status_a' => $status]);
      $data->update($request->all());
      return Redirect::back();

    }
    public function keluarConfirm(Request $request, $id)
    {
      # code...
      $data = Absen::find($id);
      $status = 'DIKONFIRMASI';

      $request->request->add(['status_b' => $status]);
      $data->update($request->all());
      return Redirect::back();
    }
    public function reject($id)
    {
      $data = Prakerin::find($id);

      $data->delete($data);
      return Redirect::back()->with('sukses','Data Berhasil di Hapus');
    }

}
