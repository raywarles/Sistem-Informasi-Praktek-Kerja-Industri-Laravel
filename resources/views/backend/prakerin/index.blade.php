@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    PRAKERIN <small>STATUS / AJUKAN </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Prakerin</li>
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
                       
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                     <h4 align="center">Permohonan Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    @if($stats == 'ADA') 
                                    <font>Nama Siswa : {{Session::get('nama')}}</font>
                                    <br>
                                    <font>Kelas : {{$data->siswa->kelas}}</font>
                                    <br>
                                    <font>Jurusan : {{$data->siswa->jurusan}}</font>
                                    <br><br>
                                    <form action="/prakerin/req" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="siswa_id" value="{{$data->siswa->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tempat Praktek</label>
                                            <select name="industri_id" class="form-control" disabled>
                                                @foreach($industris as $ind)
                                                <option value="{{$ind->industri->id}}">{{$ind->nama}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Periode</label>
                                            <select name="periode_id" class="form-control" disabled>
                                                @foreach($periodes as $per)
                                                <option value="{{$per->id}}">{{$per->periode}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Perkiraan Tanggal Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar" disabled>
                                        </div>
                                        
                                        <button style="float: right;" type="submit" class="btn btn-warning" disabled>AJUKAN</button>
                                        <br>
                                        <p style="color: red;">Anda sudah pernah mengajukan permohonan praktek industri. silahkan hubungi pihak sekolah untuk membatalkan status praktek industri anda!</p>
                                    </form>
                                    @else
                                    <font>Nama Siswa : {{Session::get('nama')}}</font>
                                    <br>
                                    <font>Kelas : {{$data->siswa->kelas}}</font>
                                    <br>
                                    <font>Jurusan : {{$data->siswa->jurusan}}</font>
                                    <br><br>
                                    <form action="/prakerin/req" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="siswa_id" value="{{$data->siswa->id}}">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tempat Praktek</label>
                                            <select name="industri_id" class="form-control">
                                                @foreach($industris as $ind)
                                                <option value="{{$ind->industri->id}}">{{$ind->nama}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Periode</label>
                                            <select name="periode_id" class="form-control">
                                                @foreach($periodes as $per)
                                                <option value="{{$per->id}}">{{$per->periode}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Perkiraan Tanggal Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar">
                                        </div>
                                        
                                        <button style="float: right;" type="submit" class="btn btn-warning">AJUKAN</button>
                                    </form>
                                    
                                    @endif

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
	
@endsection
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>