<?php $__env->startSection('content'); ?>
        <div id="page-wrapper">
            <div class="header"> 
                        <h1 class="page-header">
                            DATA PERMOHONAN <small></small>
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
                                                <th>Siswa</th>
                                                <th>Industri</th>
                                                <th>Pembimbing</th>
                                                <th>Waktu Pelaksanaan</th>
                                                <th>Aksi</th>       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            <?php $__currentLoopData = $prakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($no+=1); ?></td>
                                                <td><?php echo e($prak->siswa->user->nama); ?></td>
                                                <td><?php echo e($prak->industri->user->nama); ?></td>
                                                <td>
                                                    <form action="/prakerin/confirm" method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="id" value="<?php echo e($prak->id); ?>">
                                                        <select name="guru_id" class="form-control">
                                                            <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($guru->gurunya->id); ?>"><?php echo e($guru->nama); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                </td>
                                                <td><?php echo e($prak->tgl_masuk->format('d M Y')); ?> <br>s/d<br><?php echo e($prak->tgl_keluar->format('d M Y')); ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                                                </form>
                                                    <a href="/prakerin/<?php echo e($prak->id); ?>/reject" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
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
    
        <!-- /. MODAL GURU  -->
         <script src="<?php echo e(asset('back_asset/js/jquery-1.10.2.js')); ?>"></script>
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