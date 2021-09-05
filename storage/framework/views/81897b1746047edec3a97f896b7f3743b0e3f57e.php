<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            HOME <small><?php echo e(Session::get('level')); ?></small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li class="active">Dashboard</li>
                    </ol> 
                                    
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div id="page-inner">
                <?php if(Session::get('level')=='Admin'): ?>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3 align="center"><?php echo e($jsiswa); ?></h3>
                                <small>Siswa</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-users fa-5x red"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                    
                           <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3 align="center"><?php echo e($jguru); ?></h3>
                                <small>Guru</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-users fa-5x blue"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                    
                           <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3 align="center"><?php echo e($jindustri); ?></h3>
                                <small>Industri</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-users fa-5x green"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                    
                           <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3 align="center">
                                <h3 align="center"><?php echo e($jreq); ?></h3>
                                <small>Permohonan</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-cog fa-5x yellow"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3 align="center"><?php echo e($jjalan); ?></h3>
                                <small>Prakerin Berjalan</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-cogs fa-5x yellow"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>             
                </div>
                <?php elseif(Session::get('level')=='Industri'): ?>
                <div class="row">
                
                    
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3 align="center">
                                <h3 align="center"><?php echo e($jreq1); ?></h3>
                                <small>Permohonan</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-cog fa-5x yellow"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3>
                                <h3 align="center"><?php echo e($jreq2); ?></h3>
                                <small>Prakerin Berjalan</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-cogs fa-5x yellow"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>             
                </div>
                <?php elseif(Session::get('level')=='Guru'): ?>
                <div class="row">
                
                    
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                        <div class="number">
                            <h3 align="center">
                                <h3 align="center"><?php echo e($jreq1); ?></h3>
                                <small>Bimbingan</small>
                            </h3> 
                        </div>
                        <div class="icon">
                           <i class="fa fa-book fa-5x green"></i>
                        </div>
         
                        </div>
                        </div>
                    </div>
                                
                </div>
                <?php endif; ?>
                 <div class="row">
                      <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <p align="center">Informasi Praktek Kerja Industri</p>
                               <hr>
                            </div>                                            
                            <div class="panel-body"> 
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>Periode</td>
                                            <td>Deskripsi</td>
                                            <td>Dokumen</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $periode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($per->periode); ?></td>
                                            <td><?php echo e($per->deskribsi); ?></td>
                                            <td><a href="/periode/download/<?php echo e($per->id); ?>"><?php echo e($per->dokumen); ?></a></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                             </div>                     
                </div>
                <div class="row">
					  <div class="col-md-8">
					     <div class="panel panel-default">
						<div class="panel-heading">
						 		<p align="justify">Hello, <font color="red"><?php echo e(Session::get('nama')); ?></font> selamat datang di Sistem Infomrasi Praktek Kerja Industri, kamu berhasil login sebagai <font color="red"><?php echo e(Session::get('level')); ?></font>. </p>
						</div>        									  
							<div class="panel-body"> 
								
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
	 <script src="<?php echo e(asset('back_asset/js/jquery-1.10.2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>