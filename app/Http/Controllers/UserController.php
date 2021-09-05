<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use App\Industri;
use App\Prakerin;
use Hash;
use App\Periode;
use Redirect;
use Session;
use Carbon;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
    	# code...

    	$data = User::where('email',$request->email)->first();
    	if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($request->password , $data->password)){
                Session::put('id',$data->id);
                Session::put('login',TRUE);
                Session::put('level',$data->level);
                Session::put('avatar',$data->avatar);
                Session::put('nama',$data->nama);
                return redirect('/dashboard');
            }
        	elseif ($request->password == $data->password) {
            	Session::put('id',$data->id);
                Session::put('login',TRUE);
                Session::put('level',$data->level);
                Session::put('avatar',$data->avatar);
                Session::put('nama',$data->nama);
                return redirect('/dashboard');
            }
            else{
                return redirect('/')->with('alert','Email atau Password yang diinputkan salah');
            }
    	
    	}
    else{
      return Redirect::back()->with('alert','Email atau Password yang diinputkan salah');
    }
	}
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function getUser()
    {
        # code...
        $gurus = User::where('level','Guru')->get();
        $industris = User::where('level','Industri')->get();
        $siswas = User::where('level','Siswa')->get();
        return view('backend.user.index',compact('gurus','industris','siswas'));
    }
    public function tambahGuru(Request $request)
    {
        //Simpan Ke Tabel USer
      $this->validate($request, [
          'email' => 'required|email',
          'berkas1' => 'required',
          'password' => 'required', 
          'nama' => 'required',
          'nip' => 'required',
          'nope' => 'required',
          'jk' => 'required'

      ]);
      $file = $request->file('avatar1');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'back_asset/img/avatar';
      $file->move($destinationPath,$file->getClientOriginalName());
      $request->request->add(['avatar' => $nama_file]);
      
      $user = new \App\User;
      $user->level = 'Guru';
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->nama = $request->nama;
      $user->avatar = $request->avatar;
      $user->save();
      
      //Simpan Ke Tabel Pengurus
      $request->request->add(['user_id' => $user->id]);
      
      $guru = Guru::create($request->all());
      if ($guru) {
         return redirect('/users')->with('alertgurusukses','Sukses Menambahkan Data Guru');
      }
      else{
        return $validator->errors()->all();
      }
     
    }

    public function tambahSiswa(Request $request)
    {
        //Simpan Ke Tabel USer
      $this->validate($request, [
          'email' => 'required|email',
          'avatar1' => 'required',
          'password' => 'required', 
          'nama' => 'required',
          'nis' => 'required',
          'nope' => 'required',
          'jk' => 'required'

      ]);
      $file = $request->file('avatar1');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'back_asset/img/avatar';
      $file->move($destinationPath,$file->getClientOriginalName());
      $request->request->add(['avatar' => $nama_file]);
      
      $user = new \App\User;
      $user->level = 'Siswa';
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->nama = $request->nama;
      $user->avatar = $request->avatar;
      $user->save();
      
      //Simpan Ke Tabel Pengurus
      $request->request->add(['user_id' => $user->id]);
      
      $guru = Siswa::create($request->all());
      if ($guru) {
         return redirect('/users')->with('alertsiswasukses','Sukses Menambahkan Data Siswa');
      }
      else{
        return redirect('/users')->with('alertsiswagagal','Gagal Menambahkan Data Siswa');
      }
    }
    public function tambahIndustri(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|email',
          'avatar1' => 'required',
          'password' => 'required', 
          'nama' => 'required',


      ]);
        //Simpan Ke Tabel USer
      $file = $request->file('avatar1');
   
      // Mendapatkan Nama File
      $nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      $extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      $ukuran_file = $file->getSize();
   
      // Proses Upload File
      $destinationPath = 'back_asset/img/avatar';
      $file->move($destinationPath,$file->getClientOriginalName());
      $request->request->add(['avatar' => $nama_file]);
      
      $user = new \App\User;
      $user->level = 'Industri';
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->nama = $request->nama;
      $user->avatar = $request->avatar;
      $user->save();
      
      //Simpan Ke Tabel Pengurus
      $request->request->add(['user_id' => $user->id]);
      
      $guru = Industri::create($request->all());
      if ($guru) {
         return redirect('/users')->with('alertindustrisukses','Sukses Menambahkan Data Industri');
      }
      else{
        return redirect('/users')->with('alertindustrigagal','Gagal Menambahkan Data Industri');
      }
    }

    public function hapusGuru($id)
    {
       $data = User::find($id);
      $profile = Guru::where('user_id',$id)->first();
      $profile->delete($profile);
      $data->delete($data);
      return redirect('/users')->with('alertgurusukses','Data Berhasil di Hapus');
    }
    public function hapusIndustri($id)
    {
        $data = User::find($id);
      $profile = Industri::where('user_id',$id)->first();
      $profile->delete($profile);
      $data->delete($data);
      return redirect('/users')->with('alertindustrisukses','Data Berhasil di Hapus');
    }
    public function hapusSiswa($id)
    {
        $data = User::find($id);
      $profile = Siswa::where('user_id',$id)->first();
      $profile->delete($profile);
      $data->delete($data);
      return redirect('/users')->with('alertsiswasukses','Data Berhasil di Hapus');
    }
    public function profile($id)
    {
      
        # code...
        $profile = User::find($id);
        if ($profile->level == 'Guru') {
          return view('backend.user.profileguru', compact('profile'));
        }
        elseif ($profile->level == 'Siswa') {
          return view('backend.user.profilesiswa', compact('profile'));
        }
        elseif ($profile->level == 'Industri') {
          return view('backend.user.profileindustri', compact('profile'));
        }
    }
    public function profile2()
    {
      
     
        $id = Session::get('id');
        $profile = User::find($id);
        if ($profile->level == 'Guru') {
          return view('backend.user.profileguru', compact('profile'));
        }
        elseif ($profile->level == 'Siswa') {
          return view('backend.user.profilesiswa', compact('profile'));
        }
        elseif ($profile->level == 'Industri') {
          return view('backend.user.profileindustri', compact('profile'));
        }
         elseif (Session::get('level') == 'Admin') {
          $id = Session::get('id');
        $profile = User::find($id);
          return view('backend.user.profileadmin',compact('profile'));
        }
      
    }
    public function updateGuru(Request $request)
    {
      $id = $request->id;
      $user = \App\User::find($id);
        $user->update($request->all());
        $user->save();
        $updet = Guru::where('user_id',$id)->first();
        $updet->update($request->all());
        $updet->save();
        if($request->hasFile('avatar1')){
          $request->file('avatar')->move('back_asset/img/avatar',$request->file('avatar')->getClientOriginalName());
          $updet->avatar = $request->file('avatar')->getClientOriginalName();
          $updet->save();
          return Redirect::back();
        }
        else{
          return Redirect::back();
        }
    }
    public function updateSiswa(Request $request)
    {
      # code...
      $id = $request->id;
      $user = \App\User::find($id);
        $user->update($request->all());
        $user->save();
        $updet = Siswa::where('user_id',$id)->first();
        $updet->update($request->all());
        $updet->save();
        if($request->hasFile('avatar1')){
          $request->file('avatar')->move('back_asset/img/avatar',$request->file('avatar')->getClientOriginalName());
          $updet->avatar = $request->file('avatar')->getClientOriginalName();
          $updet->save();
          return Redirect::back();
        }
        else{
          return Redirect::back();
        }
    }
    public function updateIndustri(Request $request)
    {
      # code...
      $id = $request->id;
      $user = \App\User::find($id);
        $user->update($request->all());
        $user->save();
        $updet = Industri::where('user_id',$id)->first();
        $updet->update($request->all());
        $updet->save();
        if($request->hasFile('avatar1')){
          $request->file('avatar')->move('back_asset/img/avatar',$request->file('avatar')->getClientOriginalName());
          $updet->avatar = $request->file('avatar')->getClientOriginalName();
          $updet->save();
          return Redirect::back();
        }
        else{
          return Redirect::back();
        }
    }
    public function gantiPass(Request $request)
    {
      # code...

      $data = User::find($request->id);

      if(Hash::check($request->pass_lama , $data->password)){
         $data->password = bcrypt($request->pass_baru);
         $data->save();
         return back()->withMessage('Password Berhasil di Ubah');
      }
      elseif($request->old_pass == $data->password){
        $data->password = bcrypt($request->new_pass);
         $data->save();
        return back()->withMessage('Password Berhasil di Ubah');
      }
    }
    public function dashboard()
    {
      if(Session::get('level')=='Admin'){
        $periode = Periode::all();
        $siswa = User::where('level','Siswa')->get();
        $guru = User::where('level','Guru')->get();
        $industri = User::where('level','Industri')->get();
        $req_admin = Prakerin::where('status_prakerin','MENUNGGU PERSETUJUAN PANITIA')->get();
        $jalan = Prakerin::where('status_prakerin','BERJALAN')->get();

        $jsiswa = count($siswa);
        $jguru = count($guru);
        $jindustri = count($industri);
        $jreq = count($req_admin);
        $jjalan = count($jalan);

        return view('backend.index',compact('jsiswa','jguru','jindustri','jreq','jjalan','periode'));
      }
      elseif(Session::get('level')=='Industri'){
        $periode = Periode::all();
        $id = Session::get('id');
        $usern = User::find($id);
        $req = Prakerin::where('status_prakerin','DITERUSKAN KE INDUSTRI')->where('industri_id',$usern->industri->id)->get();
        $req2 = Prakerin::where('status_prakerin','BERJALAN')->where('industri_id',$usern->industri->id)->get();
        $jreq1 = count($req);
        $jreq2 = count($req2);
        return view('backend.index',compact('jreq1','jreq2','periode'));
      }
      elseif(Session::get('level')=='Guru'){
        $periode = Periode::all();
        $id = Session::get('id');
        $usern = User::find($id);
        $req = Prakerin::where('guru_id',$usern->gurunya->id)->get();
        $jreq1 = count($req);
        return view('backend.index',compact('jreq1','periode'));
      }
      else{
         $periode = Periode::all();
         return view('backend.index',compact('periode'));
      }
    }
}
