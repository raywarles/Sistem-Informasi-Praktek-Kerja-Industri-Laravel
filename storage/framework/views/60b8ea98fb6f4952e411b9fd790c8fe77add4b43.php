<?php $__env->startSection('content'); ?>
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
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div id="page-inner">
                    <div class="row">
                       
                        <div class="col-sm-6 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                     <h4 align="center">Permohonan Prakerin</h4>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <?php if($stats == 'ADA'): ?> 
                                    <font>Nama Siswa : <?php echo e(Session::get('nama')); ?></font>
                                    <br>
                                    <font>Kelas : <?php echo e($data->siswa->kelas); ?></font>
                                    <br>
                                    <font>Jurusan : <?php echo e($data->siswa->jurusan); ?></font>
                                    <br><br>
                                    <form action="/prakerin/req" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="siswa_id" value="<?php echo e($data->siswa->id); ?>">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tempat Praktek</label>
                                            <select name="industri_id" class="form-control" disabled>
                                                <?php $__currentLoopData = $industris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ind->industri->id); ?>"><?php echo e($ind->nama); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Periode</label>
                                            <select name="periode_id" class="form-control" disabled>
                                                <?php $__currentLoopData = $periodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($per->id); ?>"><?php echo e($per->periode); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Perkiraan Tanggal Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar" disabled>
                                        </div>
                                        
                                        <button style="float: right;" type="submit" class="btn btn-warning" disabled>AJUKAN</button>
                                        <br>
                                        <p style="color: red;">Anda sudah pernah mengajukan permohonan praktek industri. silahkan hubungi pihak sekolah untuk membatalkan status praktek industri anda!</p>
                                    </form>
                                    <?php else: ?>
                                    <font>Nama Siswa : <?php echo e(Session::get('nama')); ?></font>
                                    <br>
                                    <font>Kelas : <?php echo e($data->siswa->kelas); ?></font>
                                    <br>
                                    <font>Jurusan : <?php echo e($data->siswa->jurusan); ?></font>
                                    <br><br>
                                    <form action="/prakerin/req" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="siswa_id" value="<?php echo e($data->siswa->id); ?>">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tempat Praktek</label>
                                            <select name="industri_id" class="form-control">
                                                <?php $__currentLoopData = $industris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ind->industri->id); ?>"><?php echo e($ind->nama); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Periode</label>
                                            <select name="periode_id" class="form-control">
                                                <?php $__currentLoopData = $periodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($per->id); ?>"><?php echo e($per->periode); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Perkiraan Tanggal Keluar</label>
                                            <input type="date" class="form-control" name="tgl_keluar">
                                        </div>
                                        
                                        <button style="float: right;" type="submit" class="btn btn-warning">AJUKAN</button>
                                    </form>
                                    
                                    <?php endif; ?>

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
	
<?php $__env->stopSection(); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>