@extends('backend.master')
@section('content')
        <div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            DATA GURU <small></small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li class="active">Data Guru</li>
                    </ol> 
                                    
            </div>
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
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Nomor Kontak</th>
                                                <th>Jenis Kelamin</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach($datanya as $data)
                                            <tr>
                                                <td>{{$no+=1}}</td>
                                                <td>{{$data->nama}}</td>
                                                <td>{{$data->gurunya->nip}}</td>
                                                <td>{{$data->gurunya->nope}}</td>
                                                <td>{{$data->gurunya->jk}}</td>
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