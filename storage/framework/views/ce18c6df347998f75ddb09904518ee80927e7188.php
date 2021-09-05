<?php $__env->startSection('content'); ?>
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
                                       <?php echo e(csrf_field()); ?>

                                        <select class="form-control" name="periode">
                                            <?php $__currentLoopData = $periode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($per->id); ?>"><?php echo e($per->periode); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    
                                    <br>
                                </div>
                                <button style="float: left;" class="btn  btn-success" type="submit"><i class="fa fa-search"></i> Filter</button>
                                </form>
                                <div class="col-lg-6">
                                    <form action="/prakerin/cetak" method="POST">
                                       <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="peri" value="<?php echo e($peri); ?>">
                                        <button style="float: left;" class="btn  btn-warning" type="submit" ><i class="fa fa-print" ></i> Cetak</button>          
                                    </form>
                                </div>
                                </div>
                                <?php if(\Session::has('alert')): ?>
                                <div class="alert alert-success">
                                    <div><p style="color: white;"><?php echo e(Session::get('alert')); ?></p></div>
                                </div>
                                <?php endif; ?>
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
                                           <?php $__currentLoopData = $ceks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <tr>
                                               <td><?php echo e($no+=1); ?></td>
                                               <td><?php echo e($cek->siswa->user->nama); ?></td>
                                               <td><?php echo e($cek->siswa->kelas); ?></td>
                                               <td><?php echo e($cek->siswa->jurusan); ?></td>
                                               <td><?php echo e($cek->industri->user->nama); ?></td>
                                               <td><?php echo e($cek->guru->user->nama); ?></td>
                                               <td><?php echo e($cek->periode->periode); ?></td>
                                               <td><?php echo e($cek->tgl_masuk->format('d M Y')); ?></td>
                                               <td><?php echo e($cek->tgl_keluar->format('d M Y')); ?></td>
                                               <td><?php echo e($cek->status_prakerin); ?></td>
                                               <td><?php if(isset($cek->nilaiguru->rerata)): ?>
                                                    <?php echo e(round($cek->nilaiguru->rerata, 2)); ?>

                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?></td>
                                               <td><?php if(isset($cek->nilaiindustri->rerata)): ?>
                                                     <?php echo e(round($cek->nilaiindustri->rerata, 2)); ?>

                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?></td>
                                               <td><?php if(isset($cek->laporan->id)): ?>
                                                    <a href="/laporan/download/<?php echo e($cek->laporan->id); ?>"><?php echo e($cek->laporan->laporan); ?></a>
                                                    <?php else: ?>
                                                    Belum Ada
                                                    <?php endif; ?></td>
                                               <td><a href="/sertifikat/download/<?php echo e($cek->id); ?>"><?php echo e($cek->sertifikat); ?></a></td>
                                           </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>