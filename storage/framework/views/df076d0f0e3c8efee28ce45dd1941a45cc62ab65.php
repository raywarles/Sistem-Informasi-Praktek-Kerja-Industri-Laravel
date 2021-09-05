<?php $__env->startSection('content'); ?>
        
        <?php if($cek == null): ?>
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
            <div id="page-inner">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default ">
                                <div class="panel-heading">
                                     <h4 align="center">Status Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <p style="color: red;" align="center">Anda Belum Mengajukan Permohonan Praktek Industri</p>
                                    <p align="center"><a href="/prakerin" class="btn btn-primary">Ajukan Sekarang</a></p>

                                
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
        <?php else: ?>
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
            <div id="page-inner">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                     <h4 align="center">Status Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="table_id2" class="display">
                                            <tr>
                                                <td>Nama Siswa</td>
                                                <td>:</td>
                                                <td><?php echo e($data->nama); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td><?php echo e($data->siswa->kelas); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td>:</td>
                                                <td><?php echo e($data->siswa->jurusan); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Prakerin</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->industri->user->nama); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Guru Pembimbing</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if(isset($cek->guru->user->nama)): ?>
                                                    <?php echo e($cek->guru->user->nama); ?>

                                                    <?php else: ?>
                                                        Belum Di Tunjuk
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Periode Prakerin</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->periode->periode); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Masuk</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->tgl_masuk->format('d M Y')); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Keluar</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->tgl_keluar->format('d M Y')); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Prakerin</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->status_prakerin); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Guru</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if(isset($cek->nilaiguru->rerata)): ?>
                                                    <?php echo e(round($cek->nilaiguru->rerata, 2)); ?>

                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Industri</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if(isset($cek->nilaiindustri->rerata)): ?>
                                                     <?php echo e(round($cek->nilaiindustri->rerata, 2)); ?>

                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Laporan</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if(isset($cek->laporan->id)): ?>
                                                    <a href="/laporan/download/<?php echo e($cek->laporan->id); ?>"><?php echo e($cek->laporan->laporan); ?></a>
                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sertifikat</td>
                                                <td>:</td>
                                                <td><a href="/sertifikat/download/<?php echo e($cek->id); ?>"><?php echo e($cek->sertifikat); ?></a></td>
                                            </tr>
                                        </table>
                                    </div>

                                
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                     <h4 align="center">Upload Laporan Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    
                                    
                                    <form action="/prakerin/laporan/add" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="prakerin_id" value="<?php echo e($cek->id); ?>">
                                        <div class="form-group">
                                           
                                                <label for="exampleInputFile">Keterangan</label>
                                                <textarea class="form-control" name="keterangan"></textarea>
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                                <label for="exampleInputFile">Upload Laporan</label>
                                                <input class="form-control" name="laporan1" type="file" id="exampleInputFile">
                                           
                                        </div>
                                        <input type="submit" value="Upload" class="btn btn-primary" name="">
                                    </form>
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
        <?php endif; ?>
		
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>