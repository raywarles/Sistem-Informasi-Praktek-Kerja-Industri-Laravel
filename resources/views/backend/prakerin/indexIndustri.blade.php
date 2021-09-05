@extends('backend.master')
@section('content')
        <div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            DATA PERMOHONAN <small>{{Session::get('level')}}</small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li class="active">Data Permohonan</li>
                    </ol> 
                                    
            </div>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                       <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 align="center">DAFTAR PERMOHONAN</h4>
                            </div>            
                            <div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-xs-6">
                                            <input style="float: left;width: 80%;" type="text" class="form-control" name="search" placeholder="Cari">
                                            <button style="width: 20%;float: left;" type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-lg-6">
                                    
                                </div>
                                </div>
                                @if(\Session::has('alert'))
                                <div class="alert alert-success">
                                    <div><p style="color: white;">{{Session::get('alert')}}</p></div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="table_id3" class="display">
                                        <thead>
                                            <tr bgcolor="#3aafa9" style="color: white;">
                                                <th>No</th>
                                                <th>Siswa</th>
                                                <th>Industri</th>
                                                <th>Pembimbing</th>
                                                <th>Waktu Pelaksanaan</th>
                                                <th >Aksi</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach($prakers as $prak)
                                            <tr>
                                                <td>{{$no+=1}}</td>
                                                <td>{{$prak->siswa->user->nama}}</td>
                                                <td>{{$prak->industri->user->nama}}</td>
                                                <td>
                                                    {{$prak->guru->user->nama}}
                                                </td>
                                                <td>{{$prak->tgl_masuk->format('d M Y')}} <br>s/d<br>{{$prak->tgl_keluar->format('d M Y')}}</td>
                                                <td>
                                                    <form action="/prakerin/accept" method="POST">
                                                     {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{$prak->id}}"> 
                                                        <button onclick="return confirm('Terima Permohonan Praktek Industri?')" style="float: left;" type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                                    </form>
                                                                                             
                                                    <a  style="float: right;" href="/prakerin/{{$prak->id}}/reject" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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