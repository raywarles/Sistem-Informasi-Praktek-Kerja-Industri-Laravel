<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            DATA INDUSTRI <small></small>
                        </h1>
                    <ol class="breadcrumb">
                      <li><a href="/dashboard">Dashboard</a></li>
                      <li class="active">Data Industri</li>
                    </ol> 
                                    
            </div>
            <div id="page-inner">
                <div class="row">
					<div class="col-md-12">
					   <div class="panel panel-default">
    						<div class="panel-heading">
    						 	<h4 align="center">DAFTAR INDUSTRI</h4>
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
                                <?php if(\Session::has('alert')): ?>
                                <div class="alert alert-success">
                                    <div><p style="color: white;"><?php echo e(Session::get('alert')); ?></p></div>
                                </div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table id="table_id3" class="display">
                                        <thead>
                                            <tr bgcolor="#3aafa9" style="color: white;">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Deskripsi</th>
                                                <th>Nomor Kontak</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            <?php $__currentLoopData = $datanya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($no+=1); ?></td>
                                                <td><?php echo e($data->nama); ?></td>
                                                <td><?php echo e($data->industri->alamat); ?></td>
                                                <td><?php echo e($data->industri->deskribsi); ?></td>
                                                <td><?php echo e($data->industri->nope); ?></td>
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
	 <script src="<?php echo e(asset('back_asset/js/jquery-1.10.2.js')); ?>"></script>
        <!-- /. MODAL GURU  -->
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