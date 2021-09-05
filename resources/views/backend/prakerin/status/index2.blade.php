@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    DATA PRAKERIN <small>GURU</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Data Prakerin</li>
                </ol>                 
            </div>
            <div id="page-inner">
                    <div class="row">
                        <?php $nop = 0; $nop2 = 0;$nop3 = 0; $nop4 = 0; ?>
                        @foreach($ceks as $cek)
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                     <h4 align="center">Data Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Nama Siswa</td>
                                                <td>:</td>
                                                <td>{{$cek->siswa->user->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td>{{$cek->siswa->kelas}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td>:</td>
                                                <td>{{$cek->siswa->jurusan}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Prakerin</td>
                                                <td>:</td>
                                                <td>{{$cek->industri->user->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Guru Pembimbing</td>
                                                <td>:</td>
                                                <td>{{$cek->guru->user->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Periode Prakerin</td>
                                                <td>:</td>
                                                <td>{{$cek->periode->periode}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Masuk</td>
                                                <td>:</td>
                                                <td>{{$cek->tgl_masuk->format('d M Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Keluar</td>
                                                <td>:</td>
                                                <td>{{$cek->tgl_keluar->format('d M Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status Prakerin</td>
                                                <td>:</td>
                                                <td>{{$cek->status_prakerin}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Guru</td>
                                                <td>:</td>
                                                <td>
                                                    @if(isset($cek->nilaiguru->rerata))
                                                    {{round($cek->nilaiguru->rerata, 2)}}
                                                    @else
                                                    Belum Ada
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Industri</td>
                                                <td>:</td>
                                                <td>
                                                    @if(isset($cek->nilaiindustri->rerata))
                                                     {{round($cek->nilaiindustri->rerata, 2)}}
                                                    @else
                                                    Belum Ada
                                                    @endif
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Laporan</td>
                                                <td>:</td>
                                                <td>
                                                    @if(isset($cek->laporan->id))
                                                    <a href="/laporan/download/{{$cek->laporan->id}}">{{$cek->laporan->laporan}}</a>
                                                    @else
                                                    Belum Ada
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sertifikat</td>
                                                <td>:</td>
                                                <td><a href="/sertifikat/download/{{$cek->id}}">{{$cek->sertifikat}}</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample{{$nop+=1}}" aria-expanded="false" aria-controls="collapseExample">
                                        Input Nilai Guru &nbsp; <i class="fa fa-pencil"></i>
                                    </button>
                                    <br><br>
                                    @if(!isset($cek->nilaiguru->rerata))
                                    <div class="collapse" id="collapseExample{{$nop2+=1}}">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-guru/add" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="prakerin_id" value="{{$cek->id}}">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr bgcolor="#286090">
                                                            <td>No</td>
                                                            <td colspan="2">Kriteria Penilaian</td>
                                                          
                                                            <td>Nilai</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Afektif</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="afektif">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Kognitif</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="kognitif">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Psikomotor</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="psikomotor">
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                                <input type="submit" value="Input" class="btn btn-primary" >
                                            </form>
                                      </div>
                                    </div>
                                    @elseif(isset($cek->nilaiguru->rerata))
                                    <div class="collapse" id="collapseExample{{$nop2+=1}}">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-guru/update" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="prakerin_id" value="{{$cek->id}}">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr bgcolor="#286090">
                                                            <td>No</td>
                                                            <td colspan="2">Kriteria Penilaian</td>
                                                          
                                                            <td>Nilai</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Afektif</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="afektif" value="{{$cek->nilaiguru->afektif}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Kognitif</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="kognitif" value="{{$cek->nilaiguru->kognitif}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Psikomotor</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="psikomotor" value="{{$cek->nilaiguru->psikomotor}}">
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                                <input type="submit" value="Update" class="btn btn-primary" >
                                            </form>
                                      </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
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