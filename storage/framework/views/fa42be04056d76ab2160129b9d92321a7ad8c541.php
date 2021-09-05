
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LAPORAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
<style>
    @page  { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        
    <hr>
    <h1>LAPORAN PRAKERIN PERIODE <?php echo e($per1); ?></h1>

    <hr>
    <br>
        <table class="table" style="font-size: 10pt;">
            <thead>
                                            <?php $no=0; ?>
                                            <tr bgcolor="#3aafa9" style="color: white;">
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Tempat Prakerin</th>
                                                <th>Guru Pembimbing</th>
                                                <th>Periode</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Status Prakerin</th>
                                                <th>Nilai Guru</th>
                                                <th>Nilai Industri</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $__currentLoopData = $ceks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <tr>
                                               <td><?php echo e($no+=1); ?></td>
                                               <td><?php echo e($cek->siswa->user->nama); ?></td>
                                               <td><?php echo e($cek->siswa->kelas); ?> - <?php echo e($cek->siswa->jurusan); ?></td>
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
                                              
                                           </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
        </table>
    </section>
</body>
</html>
<script >
  window.print();
</script>