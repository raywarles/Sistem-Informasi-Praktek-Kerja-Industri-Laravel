<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Sistem Informasi Praktek Kerja Industri</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo e(asset('login_asset/images/icons/favicon.ico')); ?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/animsition/css/animsition.min.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/vendor/daterangepicker/daterangepicker.css')); ?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('login_asset/css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                 <div class="login100-form-title" style=" background-image: url('<?php echo e(asset('login_asset/images/bannerlogin.jpg')); ?>');"><!-- Ganti Background disini -->
                    <span class="login100-form-title-1">
                        Masuk
                    </span>
                    <span style="color: #ffff;font-size: 16pt;" class="">
                        SISTEM INFORMASI PRAKTEK KERJA INDUSTRI
                    </span>
                </div>
                <?php if(Session::has('alert')): ?>
                                <div class="alert alert-danger">
                                    <div><p><?php echo e(Session::get('alert')); ?></p></div>
                                </div>
                <?php endif; ?>
                <form class="login100-form validate-form" action="/login/process" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="wrap-input100 validate-input m-b-26" >
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Masukan Alamat Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" >
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Masukan password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        

                        <div>
                            <a href="#" class="txt1">
                                Lupa Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('login_asset/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/daterangepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('login_asset/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo e(asset('login_asset/js/main.js')); ?>"></script>

</body>
</html>