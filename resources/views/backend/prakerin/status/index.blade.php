@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    DATA PRAKERIN <small>ADMIN</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Data Prakerin</li>
                </ol>                 
            </div>
            <div id="page-inner">
                    <div class="row">
                    <div class="col-md-12">
                       <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 align="center">History Prakerin</h4>
                            </div>
                                             
                            <div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-2">
                                    <form method="POST" action="/prakerin/filter">
                                       {{ csrf_field() }}
                                        <select class="form-control" name="periode">
                                            @foreach($periode as $per)
                                                <option value="{{$per->id}}">{{$per->periode}}</option>
                                            @endforeach
                                        </select>

                                    
                                    <br>
                                </div>
                                <button style="float: left;" class="btn  btn-success" type="submit"><i class="fa fa-search"></i> Filter</button>
                                </form>
                                <div class="col-lg-6">
                                    <form action="/prakerin/cetak" method="POST">
                                       {{ csrf_field() }}
                                        <input type="hidden" name="peri" value="{{$peri}}">
                                        <button style="float: left;" class="btn  btn-warning" type="submit" ><i class="fa fa-print" ></i> Cetak</button>          
                                    </form>
                                </div>
                                </div>
                                @if(\Session::has('alert'))
                                <div class="alert alert-success">
                                    <div><p style="color: white;">{{Session::get('alert')}}</p></div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="table_id2" class="display">
                                        <thead>
                                            <?php $no=0; ?>
                                            <tr bgcolor="#3aafa9" style="color: white;">
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                               
                                                <th>Tempat Prakerin</th>
                                                <th>Guru Pembimbing</th>
                                                <th>Periode</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Status Prakerin</th>
                                                <th>Nilai Guru</th>
                                                <th>Nilai Industri</th>
                                                <th>Laporan</th>
                                                <th>Sertifikat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($ceks as $cek)
                                           <tr>
                                               <td>{{$no+=1}}</td>
                                               <td>{{$cek->siswa->user->nama}}</td>
                                               <td>{{$cek->siswa->kelas}}</td>
                                               <td>{{$cek->siswa->jurusan}}</td>
                                               <td>{{$cek->industri->user->nama}}</td>
                                               <td>{{$cek->guru->user->nama}}</td>
                                               <td>{{$cek->periode->periode}}</td>
                                               <td>{{$cek->tgl_masuk->format('d M Y')}}</td>
                                               <td>{{$cek->tgl_keluar->format('d M Y')}}</td>
                                               <td>{{$cek->status_prakerin}}</td>
                                               <td>@if(isset($cek->nilaiguru->rerata))
                                                    {{round($cek->nilaiguru->rerata, 2)}}
                                                    @else
                                                    Belum Ada
                                                    @endif</td>
                                               <td>@if(isset($cek->nilaiindustri->rerata))
                                                     {{round($cek->nilaiindustri->rerata, 2)}}
                                                    @else
                                                    Belum Ada
                                                    @endif</td>
                                               <td>@if(isset($cek->laporan->id))
                                                    <a href="/laporan/download/{{$cek->laporan->id}}">{{$cek->laporan->laporan}}</a>
                                                    @else
                                                    Belum Ada
                                                    @endif</td>
                                               <td><a href="/sertifikat/download/{{$cek->id}}">{{$cek->sertifikat}}</a></td>
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