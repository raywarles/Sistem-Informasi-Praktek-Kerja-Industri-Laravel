@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            MANAJEMEN USER SISTEM <small>{{Session::get('level')}}</small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li class="active">Manajemen User</li>
                    </ol> 
                                    
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="page-inner">
                <div class="row">
					  <div class="col-md-12">
					     <div class="panel panel-default">
						<div class="panel-heading">
						 	<h4 align="center">DAFTAR GURU</h4>
                       
						</div>	
                        							  
							<div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-lg-6">
                                    <button style="float: right;" type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i></button>   
                                </div>
                                </div>
                                @if(Session::has('alertgurusukses'))
                                <div class="alert alert-success">
                                    <div><p style="color: black;">{{Session::get('alertgurusukses')}}</p></div>
                                </div>
                                @elseif(Session::has('alertgurugagal'))
                                <div class="alert alert-danger">
                                    <div><p style="color: black;">{{Session::get('alertgurugagal')}}</p></div>
                                </div>
                                @endif
								<div class="table-responsive">
                                    <table id="table_id" class="display">
                                    <thead>
                                        <tr bgcolor="#3aafa9" style="color: white;">
                                            <th>No</th>
                                            <th >Nama</th>
                                            <th>NIP</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($gurus as $guru)
                                        <tr>
                                            <td>{{$no+=1}}</td>
                                            <td>{{$guru->nama}}</td>
                                            <td>{{$guru->gurunya->nip}}</td>
                                            <td>{{$guru->email}}</td>
                                            <td>{{$guru->level}}</td>
                                            <td>
                                                <a href="/users/profile/{{$guru->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="/guru/delete/{{$guru->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
							</div>
						</div>
					         </div>						
				</div>
                <div class="row">
                      <div class="col-md-12">
                         <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 align="center">DAFTAR INDUSTRI</h4>
                       
                        </div>                                
                            <div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-lg-6">
                                    <button style="float: right;" type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i></button>   
                                </div>
                                </div>
                                @if(Session::has('alertindustrisukses'))
                                <div class="alert alert-success">
                                    <div><p style="color: black;">{{Session::get('alertindustrisukses')}}</p></div>
                                </div>
                                @elseif(Session::has('alertindustrigagal'))
                                <div class="alert alert-danger">
                                    <div><p style="color: black;">{{Session::get('alertindustrigagal')}}</p></div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                <table id="table_id2" class="display">
                                    <thead>
                                        <tr bgcolor="#F36A5A" style="color: white;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($industris as $industri)
                                        <tr>
                                            <td>{{$no+=1}}</td>
                                            <td>{{$industri->nama}}</td>
                                            <td align="justify" style="width: 50%;">{{$industri->industri->deskribsi}}</td>
                                            <td>{{$industri->email}}</td>
                                            <td>{{$industri->level}}</td>
                                            <td>
                                                <a href="/users/profile/{{$industri->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="/industri/delete/{{$industri->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                             </div>                     
                </div>
                <div class="row">
                      <div class="col-md-12">
                         <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 align="center">DAFTAR SISWA</h4>
                       
                        </div>                                
                            <div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-lg-6">
                                    <button style="float: right;" type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus"></i></button>   
                                </div>
                                </div>
                                @if(Session::has('alertsiswasukses'))
                                <div class="alert alert-success">
                                    <div><p style="color: black;">{{Session::get('alertsiswasukses')}}</p></div>
                                </div>
                                @elseif(Session::has('alertsiswagagal'))
                                <div class="alert alert-danger">
                                    <div><p style="color: black;">{{Session::get('alertsiswagagal')}}</p></div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                <table id="table_id3" class="display">
                                    <thead>
                                        <tr bgcolor="#C9302C" style="color: white;">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIS</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($siswas as $siswa)
                                        <tr>
                                            <td>{{$no+=1}}</td>
                                            <td>{{$siswa->nama}}</td>
                                            <td>{{$siswa->siswa->nis}}</td>
                                            <td>{{$siswa->email}}</td>
                                            <td>{{$siswa->level}}</td>
                                            <td>
                                                <a href="/users/profile/{{$siswa->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="/siswa/delete/{{$siswa->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                             </div>                     
                </div>  
                <footer>
                	<ol class="breadcrumb">
                      <p>All right reserved 2021</p>
                    </ol> 
                	
                </footer>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
	
        <!-- /. MODAL GURU  -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Guru</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/guru/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="nip" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor HP</label>
                                <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                              
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Pilih Foto Profil</label>
                                <input name="avatar1" type="file" id="exampleInputFile">
                            </div>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  
                        </form>
                </div>
            </div>
        </div>
        <!-- /. MODAL SISWA  -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Industri</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/industri/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi Industri</label>
                                <textarea class="form-control" name="deskribsi" placeholder="Keterangan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor HP</label>
                                <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputFile">Pilih Foto Profil</label>
                                <input name="avatar1" type="file" id="exampleInputFile">
                            </div>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  
                        </form>
                </div>
            </div>
        </div>
        <!-- /. MODAL INDUSTRI  -->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/siswa/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIS</label>
                                <input type="text" name="nis" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIS">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>                         
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option>X</option>
                                    <option>XI</option>
                                    <option>XII</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option>TEKNIK KOMPUTER DAN JARINGAN</option>
                                    <option>REKAYASA PERANGKAT LUNAK</option>
                                    <option>MULTIMEDIA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor HP</label>
                                <input type="text" name="nope" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputFile">Pilih Foto Profil</label>
                                <input name="avatar1" type="file" id="exampleInputFile">
                            </div>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  
                        </form>
                </div>
            </div>
        </div>
         <script src="{{asset('back_asset/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
     $(document).ready( function () {
        $('#table_id2').DataTable();
    } );
     $(document).ready( function () {
        $('#table_id3').DataTable();
    } );
</script>
@endsection
