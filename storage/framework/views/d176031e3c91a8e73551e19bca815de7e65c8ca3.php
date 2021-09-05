<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
            <div class="header"> 
                <h1 class="page-header">
                    DATA PRAKERIN <small>INDUSTRI</small>
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
                                    <button style="float: left;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo e($nop+=1); ?>" aria-expanded="false" aria-controls="collapseExample">
                                        Upload Sertifikat &nbsp; <i class="fa fa-certificate"></i>
                                    </button>
                                    <button style="float: right;" class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExam<?php echo e($nop3+=1); ?>" aria-expanded="false" aria-controls="collapseExample">
                                        Input Nilai Industri &nbsp; <i class="fa fa-pencil"></i>
                                    </button>
                                    
                                    <br><br>

                                    <div class="collapse" id="collapseExample<?php echo e($nop2+=1); ?>">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/prakerin/sertifikat/add" method="POST" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="prakerin_id" value="<?php echo e($cek->id); ?>">
                                                <div class="form-group">
                                                   
                                                        <label for="exampleInputFile">Upload Sertifikat</label>
                                                        <input class="form-control" name="sertifikat1" type="file" id="exampleInputFile">
                                                   
                                                </div>
                                                <input type="submit" value="Upload" class="btn btn-primary" name="">
                                            </form>
                                      </div>
                                    </div>
                                    <?php if(!isset($cek->nilaiindustri->rerata)): ?>
                                    <div class="collapse" id="collapseExam<?php echo e($nop4+=1); ?>">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-industri/add" method="POST" enctype="multipart/form-data">
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
                                                            <td>Kemampuan Memahami Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Ketetapan Menyelesaikan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian2">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Kecepatan Menyelesaikan Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian3">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Ketrampilan Melaksanakan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian4">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Kemampuan Menangani Informasi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian5">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Prakarsa/Kreativitas/Kemampuan Mengemukakan Ide/Saran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian6">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Kemampuan Bekerja Sama</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian7">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Reaksi terhadap Perubahan Situasi Lingkungan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian8">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Semangat/Etos Kerja</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian9">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Kepemimpinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian10">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Kedisiplinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian11">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Kejujuran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian12">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Sikap/Etika dalam Bergaul </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian13">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Kerapian (Penampilan)</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian14">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <input type="submit" value="Input" class="btn btn-primary" >
                                            </form>
                                      </div>
                                    </div>
                                    <?php elseif(isset($cek->nilaiindustri->rerata)): ?>
                                    <div class="collapse" id="collapseExam<?php echo e($nop4+=1); ?>">
                                      <div  style="border: 1px solid gray; border-radius: 15px;padding: 10px;margin: 3px;" class=" card card-body">
                                            <form action="/nilai-industri/update" method="POST" enctype="multipart/form-data">
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
                                                            <td>Kemampuan Memahami Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" value="<?php echo e($cek->nilaiindustri->penilaian1); ?>" name="penilaian1">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Ketetapan Menyelesaikan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian2" value="<?php echo e($cek->nilaiindustri->penilaian2); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Kecepatan Menyelesaikan Tugas</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian3" value="<?php echo e($cek->nilaiindustri->penilaian3); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Ketrampilan Melaksanakan Tugas </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian4" value="<?php echo e($cek->nilaiindustri->penilaian4); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Kemampuan Menangani Informasi</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian5" value="<?php echo e($cek->nilaiindustri->penilaian5); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Prakarsa/Kreativitas/Kemampuan Mengemukakan Ide/Saran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian6" value="<?php echo e($cek->nilaiindustri->penilaian6); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Kemampuan Bekerja Sama</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian7" value="<?php echo e($cek->nilaiindustri->penilaian7); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Reaksi terhadap Perubahan Situasi Lingkungan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian8" value="<?php echo e($cek->nilaiindustri->penilaian8); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Semangat/Etos Kerja</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian9" value="<?php echo e($cek->nilaiindustri->penilaian9); ?>"> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Kepemimpinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian10" value="<?php echo e($cek->nilaiindustri->penilaian10); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Kedisiplinan</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian11" value="<?php echo e($cek->nilaiindustri->penilaian11); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Kejujuran</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian12" value="<?php echo e($cek->nilaiindustri->penilaian12); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Sikap/Etika dalam Bergaul </td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian13" value="<?php echo e($cek->nilaiindustri->penilaian13); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Kerapian (Penampilan)</td>
                                                            <td>:</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="penilaian14" value="<?php echo e($cek->nilaiindustri->penilaian14); ?>">
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
                    <div class="col-12 text-center">
            <p><?php echo e($ceks->links()); ?></p>
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
            var li = document.querySelectorAll('.pagination li');
            li.forEach(function(e){
              e.classList.add('page-item');
              var c = e.children[0];
              c.classList.add('page-link')
            });
          </script>

	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>