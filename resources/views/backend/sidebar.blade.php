<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                @if(Session::get('level')=='Admin')
                <ul class="nav" id="main-menu">
                    <li class="{{ Request::is('dashboard') ? 'active-menu' : '' }}">
                        <a  href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="{{ Request::is('users') ? 'active-menu' : '' }}">
                        <a href="{{url ('users')}}"><i class="fa fa-users"></i> Manajemen User</a>
                    </li> 
                    <li>
                        <a href="{{url ('prakerin')}}"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
                    </li>     
                    <li>
                        <a href="{{url ('prakerin/status')}}"><i class="fa fa-table"></i> Data Prakerin</a>
                    </li> 
                    <li class="{{ Request::is('periode') ? 'active-menu' : '' }}">
                        <a href="{{url ('periode')}}"><i class="fa fa-calendar"></i> Periode</a>
                    </li>
                     
                    <li class="{{ Request::is('surat') ? 'active-menu' : '' }}">
                        <a href="{{url ('surat')}}"><i class="fa fa-envelope"></i>Upload Surat Permohonan</a>
                    </li>


                    <li>
                        <a href="{{url ('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>


                @elseif(Session::get('level')=='Guru')
                <ul class="nav" id="main-menu">
                    <li class="{{ Request::is('dashboard') ? 'active-menu' : '' }}">
                        <a  href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                        <a href="{{url ('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                @elseif(Session::get('level')=='Industri')
                <ul class="nav" id="main-menu">
                    <li class="{{ Request::is('dashboard') ? 'active-menu' : '' }}">
                        <a  href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>            
                    <li>
                        <a href="{{url ('prakerin')}}"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
                    </li>     
                    <li>
                        <a href="{{url ('prakerin/status')}}"><i class="fa fa-table"></i> Data Prakerin</a>
                    </li>
                    <li>
                        <a href="{{url ('absensi')}}"><i class="fa fa-history"></i> Absensi</a>
                    </li>

                    <li>
                        <a href="{{url ('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                @elseif(Session::get('level')=='Siswa')
                <ul class="nav" id="main-menu">
                    <li class="{{ Request::is('dashboard') ? 'active-menu' : '' }}">
                        <a  href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{url ('prakerin')}}"><i class="fa fa-tasks"></i> Permohonan Prakerin</a>
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
                        <a href="{{url ('absensi')}}"><i class="fa fa-history"></i> Absensi</a>
                    </li>
                    <li>
                        <a href="{{url ('surat')}}"><i class="fa fa-envelope"></i> Surat Permohonan</a>
                    </li>
                    
                    
                    <li>
                        <a href="{{url ('logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
                @endif
            </div>

        </nav>