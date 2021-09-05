<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <?php if(Session::get('level')=='Admin'): ?>
                <ul class="nav" id="main-menu">
                    <li class="<?php echo e(Request::is('dashboard') ? 'active-menu' : ''); ?>">
                        <a  href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="<?php echo e(Request::is('users') ? 'active-menu' : ''); ?>">
                        <a href="<?php echo e(url ('users')); ?>"><i class="fa fa-users"></i> Manajemen User</a>
                    </li> 
                    <li>
                        <a href="<?php echo e(url ('prakerin')); ?>"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
                    </li>     
                    <li>
                        <a href="<?php echo e(url ('prakerin/status')); ?>"><i class="fa fa-table"></i> Data Prakerin</a>
                    </li> 
                    <li class="<?php echo e(Request::is('periode') ? 'active-menu' : ''); ?>">
                        <a href="<?php echo e(url ('periode')); ?>"><i class="fa fa-calendar"></i> Periode</a>
                    </li>
                     
                    <li class="<?php echo e(Request::is('surat') ? 'active-menu' : ''); ?>">
                        <a href="<?php echo e(url ('surat')); ?>"><i class="fa fa-envelope"></i>Upload Surat Permohonan</a>
                    </li>


                    <li>
                        <a href="<?php echo e(url ('logout')); ?>"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>


                <?php elseif(Session::get('level')=='Guru'): ?>
                <ul class="nav" id="main-menu">
                    <li class="<?php echo e(Request::is('dashboard') ? 'active-menu' : ''); ?>">
                        <a  href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Data Prakerin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/prakerin/status">Status Prakerin</a>
                            </li>
                            <li>
                                <a href="/data-industri">Data Industri</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                                    

                    <li>
                        <a href="<?php echo e(url ('logout')); ?>"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                <?php elseif(Session::get('level')=='Industri'): ?>
                <ul class="nav" id="main-menu">
                    <li class="<?php echo e(Request::is('dashboard') ? 'active-menu' : ''); ?>">
                        <a  href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>            
                    <li>
                        <a href="<?php echo e(url ('prakerin')); ?>"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
                    </li>     
                    <li>
                        <a href="<?php echo e(url ('prakerin/status')); ?>"><i class="fa fa-table"></i> Data Prakerin</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url ('absensi')); ?>"><i class="fa fa-history"></i> Absensi</a>
                    </li>

                    <li>
                        <a href="<?php echo e(url ('logout')); ?>"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                <?php elseif(Session::get('level')=='Siswa'): ?>
                <ul class="nav" id="main-menu">
                    <li class="<?php echo e(Request::is('dashboard') ? 'active-menu' : ''); ?>">
                        <a  href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url ('prakerin')); ?>"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
                    </li>     
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Data Prakerin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/prakerin/status">Status Prakerin</a>
                            </li>
                            <li>
                                <a href="/data-industri">Data Industri</a>
                            </li>
                            <li>
                                <a href="/data-guru">Data Guru/Pembimbing</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(url ('absensi')); ?>"><i class="fa fa-history"></i> Absensi</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url ('surat')); ?>"><i class="fa fa-envelope"></i> Surat Permohonan</a>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo e(url ('logout')); ?>"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>

        </nav>