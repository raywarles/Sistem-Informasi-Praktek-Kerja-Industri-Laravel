@extends('backend.master')
@section('content')
<head>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        html,body{
          height: 100%;
        }
        body{
          display: grid;
          place-items: center;
          
        }
        .clock{
          background: #fff;
          height: 120px;
          
          line-height: 120px;
          text-align: center;
          padding: 0 30px;
          box-shadow: -3px -3px 7px rgba(255,255,255,0.05),
                       3px 3px 5px rgba(0,0,0,0.5);
        }
        .clock .display{
          font-size: 40px;
          color: black;
          letter-spacing: 5px;
          font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>
		<div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            ABSENSI <small>{{Session::get('level')}}</small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li class="active">Absensi</li>
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
					<div class="col-md-4">
					   <div class="panel panel-default">
						    <div class="panel-heading">
						 		 @if(\Session::has('alert'))
                                <div class="alert alert-danger">
                                    <div><p>{{Session::get('alert')}}</p></div>
                                </div>
                @endif
						    </div>
              @if($cek->isEmpty())          									  
							<div class="panel-body"> 
								<a style="float: left;" href="#"><button class="btn btn-primary" disabled>ABSEN MASUK</button></a>
                
                <a style="float: right;" href="#"><button class="btn btn-success" disabled>ABSEN KELUAR</button></a>
							</div>
              @else
                <div class="panel-body"> 
                <a style="float: left;" href="/absensi/masuk"><button class="btn btn-primary">ABSEN MASUK</button></a>
                
                <a style="float: right;" href="/absensi/keluar"><button class="btn btn-success">ABSEN KELUAR</button></a>
              </div>
              @endif
						</div>
					</div>
                    <div class="col-md-8">
                       <div class="panel panel-default">
                            <div class="panel-heading">
                                <!-- 
                                    Heading disini
                                -->
                            </div>                                            
                            <div class="panel-body"> 
                                <div class="clock">
                                      <div class="display"> </div>
                                </div>
                                <hr>
                                <br>
                                <table id="table_id3" class="display">
                                    <thead>
                                        <tr bgcolor="#3aafa9" style="color: white;">
                                            <th>No</th>
                                            <th>Jam Masuk</th>
                                            <th>Status</th>
                                            <th>Jam Keluar</th>
                                            <th>Status</th>
                                            <th>Hari/Tanggal</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>
                                        @foreach($absens as $abs)
                                          <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$abs->jam_masuk}}</td>
                                            <td>{{$abs->status_a}}</td>
                                            <td>{{$abs->jam_keluar}}</td>
                                            <td>{{$abs->status_b}}</td>
                                            <td>{{$abs->tanggal}}</td>                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
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
        <script>
      setInterval(function(){
        const clock = document.querySelector(".display");
        let time = new Date();
        let sec = time.getSeconds();
        let min = time.getMinutes();
        let hr = time.getHours();
        let day = 'AM';
        if(hr > 12){
          day = 'PM';
          hr = hr - 12;
        }
        if(hr == 0){
          hr = 12;
        }
        if(sec < 10){
          sec = '0' + sec;
        }
        if(min < 10){
          min = '0' + min;
        }
        if(hr < 10){
          hr = '0' + hr;
        }
        clock.textContent = hr + ':' + min + ':' + sec + " " + day;
      });
    </script>
	
@endsection