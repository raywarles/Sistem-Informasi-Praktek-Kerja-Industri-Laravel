@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    DATA PRAKERIN <small>INDUSTRI</small>
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
                                    <button style="float: left;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$nop+=1}}" aria-expanded="false" aria-controls="collapseExample">
                                        Upload Sertifikat &nbsp; <i class="fa fa-certificate"></i>
                                    </button>
                                    <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExam{{$nop3+=1}}" aria-expanded="false" aria-controls="collapseExample">
                                        Input Nilai Industri &nbsp; <i class="fa fa-pencil"></i>
                                    </button>
                                    
                                    <br><br>

                                    <div class="collapse" id="collapseExample{{$nop2+=1}}">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/prakerin/sertifikat/add" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="prakerin_id" value="{{$cek->id}}">
                                                <div class="form-group">
                                                   
                                                        <label for="exampleInputFile">Upload Sertifikat</label>
                                                        <input class="form-control" name="sertifikat1" type="file" id="exampleInputFile">
                                                   
                                                </div>
                                                <input type="submit" value="Upload" class="btn btn-primary" name="">
                                            </form>
                                      </div>
                                    </div>
                                    @if(!isset($cek->nilaiindustri->rerata))
                                    <div class="collapse" id="collapseExam{{$nop4+=1}}">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-industri/add" method="POST" enctype="multipart/form-data">
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
                                                            <td>Kemampuan Memahami Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Ketetapan Menyelesaikan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian2">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Kecepatan Menyelesaikan Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian3">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Ketrampilan Melaksanakan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian4">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Kemampuan Menangani Informasi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian5">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Prakarsa/Kreativitas/Kemampuan Mengemukakan Ide/Saran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian6">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Kemampuan Bekerja Sama</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian7">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Reaksi terhadap Perubahan Situasi Lingkungan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian8">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Semangat/Etos Kerja</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian9">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Kepemimpinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Kedisiplinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian11">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Kejujuran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian12">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Sikap/Etika dalam Bergaul </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian13">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Kerapian (Penampilan)</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian14">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <input type="submit" value="Input" class="btn btn-primary" >
                                            </form>
                                      </div>
                                    </div>
                                    @elseif(isset($cek->nilaiindustri->rerata))
                                    <div class="collapse" id="collapseExam{{$nop4+=1}}">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-industri/update" method="POST" enctype="multipart/form-data">
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
                                                            <td>Kemampuan Memahami Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" value="{{$cek->nilaiindustri->penilaian1}}" name="penilaian1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Ketetapan Menyelesaikan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian2" value="{{$cek->nilaiindustri->penilaian2}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Kecepatan Menyelesaikan Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian3" value="{{$cek->nilaiindustri->penilaian3}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Ketrampilan Melaksanakan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian4" value="{{$cek->nilaiindustri->penilaian4}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Kemampuan Menangani Informasi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian5" value="{{$cek->nilaiindustri->penilaian5}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Prakarsa/Kreativitas/Kemampuan Mengemukakan Ide/Saran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian6" value="{{$cek->nilaiindustri->penilaian6}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Kemampuan Bekerja Sama</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian7" value="{{$cek->nilaiindustri->penilaian7}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Reaksi terhadap Perubahan Situasi Lingkungan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian8" value="{{$cek->nilaiindustri->penilaian8}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Semangat/Etos Kerja</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian9" value="{{$cek->nilaiindustri->penilaian9}}"> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Kepemimpinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian10" value="{{$cek->nilaiindustri->penilaian10}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Kedisiplinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian11" value="{{$cek->nilaiindustri->penilaian11}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Kejujuran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian12" value="{{$cek->nilaiindustri->penilaian12}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Sikap/Etika dalam Bergaul </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian13" value="{{$cek->nilaiindustri->penilaian13}}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Kerapian (Penampilan)</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian14" value="{{$cek->nilaiindustri->penilaian14}}">
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
                    <div class="col-12 text-center">
            <p>{{$ceks->links()}}</p>
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
        
          <script>
            var li = document.querySelectorAll('.pagination li');
            li.forEach(function(e){
              e.classList.add('page-item');
              var c = e.children[0];
              c.classList.add('page-link')
            });
          </script>

	
@endsection