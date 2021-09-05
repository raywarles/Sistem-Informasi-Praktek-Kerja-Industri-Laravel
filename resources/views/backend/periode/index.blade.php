@extends('backend.master')
@section('content')
		<div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            MANAJEMEN PERIODE <small>{{Session::get('level')}}</small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li class="active">Manajemen Periode</li>
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
    						 	<h4 align="center">DAFTAR PERIODE</h4>
    						</div>
                            
                            @if(Session::get('level')=='Admin')								  
							<div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                       
                                </div>
                                <div class="col-lg-6">
                                    <button style="float: right;" type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i></button>   
                                </div>
                                </div>
                                @if(\Session::has('alert'))
                                <div class="alert alert-success">
                                    <div><p style="color: white;">{{Session::get('alert')}}</p></div>
                                </div>
                                @endif
								<div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr bgcolor="#3aafa9" style="color: white;">
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>Deskribsi</th>
                                            <th>Dokumen</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($periods as $period)
                                        <tr>
                                            <td>{{$no+=1}}</td>
                                            <td>{{$period->periode}}</td>
                                            <td>{{$period->deskribsi}}</td>
                                            <td><a href="/periode/download/{{$period->id}}">{{$period->dokumen}}</a></td>
                                            <td>
                                                <a href="/periode/delete/{{$period->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                        </div>
							</div>
                            @elseif(Session::get('level')=='Siswa')
                            <div class="panel-body"> 
                                <div class="row">
                                <div class="col-lg-6">
                                      
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
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr bgcolor="#3aafa9" style="color: white;">
                                            <th>No</th>
                                            <th>Periode</th>
                                            <th>Deskribsi</th>
                                            <th>Dokumen</th>
                                           
                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($periods as $period)
                                        <tr>
                                            <td>{{$no+=1}}</td>
                                            <td>{{$period->periode}}</td>
                                            <td>{{$period->deskribsi}}</td>
                                            <td><a href="/periode/download/{{$period->id}}">{{$period->dokumen}}</a></td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                        </div>
                            </div>
                            @endif
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Periode</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/periode/add" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Periode</label>
                                <input type="text" name="periode" class="form-control" id="exampleInputEmail1" placeholder="Masukan Periode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskribsi</label>
                                <textarea class="form-control" name="deskribsi"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Dokumen Pendukung</label>
                                <input name="dokumen1" type="file" id="exampleInputFile">
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