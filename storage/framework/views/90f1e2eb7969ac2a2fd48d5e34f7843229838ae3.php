<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>SI-PRAKERIN</title>
    <style type="text/css">
    
    </style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://use.fontawesome.com/b41f6d663c.js"></script>

    <!-- Bootstrap Styles-->
    <link href="<?php echo e(asset('back_asset/css/bootstrap.css')); ?>" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo e(asset('back_asset/css/font-awesome.css')); ?>" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?php echo e(asset('back_asset/css/custom-styles.css')); ?>" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   



</head>
<body style="font-family: arial !important;">
    <div id="wrapper">
        <?php echo $__env->make('backend.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--/. NAV TOP  -->
        <?php echo $__env->make('backend.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /. NAV SIDE  -->
        <?php echo $__env->yieldContent('content'); ?>
        
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   
      <!-- Bootstrap Js -->
    <script src="<?php echo e(asset('back_asset/js/bootstrap.min.js')); ?>"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo e(asset('back_asset/js/jquery.metisMenu.js')); ?>"></script>
      <!-- Custom Js -->
    <script src="<?php echo e(asset('back_asset/js/custom-scripts.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
</body>
</html>
