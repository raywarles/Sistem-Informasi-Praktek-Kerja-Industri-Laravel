<?php $__env->startSection('content'); ?>
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
                        <?php $__currentLoopData = $ceks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <td><?php echo e($cek->siswa->user->nama); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->siswa->kelas); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jurusan</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->siswa->jurusan); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Prakerin</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->industri->user->nama); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Guru Pembimbing</td>
                                                <td>:</td>
                                                <td><?php echo e($cek->guru->user->nama); ?></td>
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
                                    <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo e($nop+=1); ?>" aria-expanded="false" aria-controls="collapseExample">
                                        Input Nilai Guru &nbsp; <i class="fa fa-pencil"></i>
                                    </button>
                                    <br><br>
                                    <?php if(!isset($cek->nilaiguru->rerata)): ?>
                                    <div class="collapse" id="collapseExample<?php echo e($nop2+=1); ?>">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-guru/add" method="POST" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="prakerin_id" value="<?php echo e($cek->id); ?>">
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
                                    <?php elseif(isset($cek->nilaiguru->rerata)): ?>
                                    <div class="collapse" id="collapseExample<?php echo e($nop2+=1); ?>">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-guru/update" method="POST" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="prakerin_id" value="<?php echo e($cek->id); ?>">
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
                                                                <input type="text" class="form-control" name="afektif" value="<?php echo e($cek->nilaiguru->afektif); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Kognitif</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="kognitif" value="<?php echo e($cek->nilaiguru->kognitif); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Psikomotor</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="psikomotor" value="<?php echo e($cek->nilaiguru->psikomotor); ?>">
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                                <input type="submit" value="Update" class="btn btn-primary" >
                                            </form>
                                      </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>