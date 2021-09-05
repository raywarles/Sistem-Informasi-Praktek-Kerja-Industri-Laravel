<?php $__env->startSection('content'); ?>
        <div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    PROFILE <small><?php echo e($profile->nama); ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Profile</li>
                </ol>                 
            </div>
            <div id="page-inner">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">  
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <img style="width: 100%;display: block;  margin-left: 10px; margin-right: 10px;" src="<?php echo e($profile->getAvatar()); ?>"><br>
                                    <form action="/users/changepass" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="id" value="<?php echo e($profile->id); ?>">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password Lama</label>
                                            <input type="password" name="old_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password Baru</label>
                                            <input type="password" name="new_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <button style="float: right;" type="submit" class="btn btn-warning">GANTI PASSWORD</button>
                                    </form>
                                    

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <div class="panel panel-default chartJs">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form action="/siswa/update" method="POST" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" value="<?php echo e($profile->id); ?>" name="id">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo e($profile->email); ?>" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo e($profile->nama); ?>" placeholder="Masukan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIS</label>
                                            <input type="text" name="nis" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIS" value="<?php echo e($profile->siswa->nis); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                                            <select name="jk" class="form-control">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>                         
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kelas</label>
                                            <select name="kelas" class="form-control">
                                                <option>X</option>
                                                <option>XI</option>
                                                <option>XII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jurusan</label>
                                            <select name="jurusan" class="form-control">
                                                <option>TEKNIK KOMPUTER DAN JARINGAN</option>
                                                <option>REKAYASA PERANGKAT LUNAK</option>
                                                <option>MULTIMEDIA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor HP</label>
                                            <input type="text" name="nope" class="form-control" id="exampleInputEmail1" value="<?php echo e($profile->siswa->nope); ?>" placeholder="Masukan Nomor HP">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ganti Foto Profil</label>
                                            <input name="avatar1" type="file" id="exampleInputFile">
                                        </div>  
                                        <button style="float: right;" type="submit" class="btn btn-warning">UPDATE</button>
                                        <hr>
                                        <br><br><br><br>
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>