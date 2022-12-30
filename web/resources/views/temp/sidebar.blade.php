<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <img src="{{asset('img/admin.png')}}" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-sm line-height-sm opacity-50">
                            Senior developer
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>

                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        
        <div class="sidebar-section">            
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-book"></i> <span>Master Data</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ url('master/data-siswa') }}" class="nav-link ">Data Siswa</a></li>
                        <li class="nav-item" ><a href="{{ url('master/data-pengguna') }}" class="nav-link">Data Guru</a></li>
                        <li class="nav-item"><a href="{{ url('master/data-kelompok') }}" class="nav-link">Data Kelompok</a></li>
                        <li class="nav-item"><a href="{{ url('master/data-kd') }}" class="nav-link">Data KD Indikator</a></li>                        
                    </ul>
                </li>                
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Perkembangan</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ url('perkembangan/pendidikan-karakter') }}" class="nav-link">Pendidikan Karakter</a></li>
                        <li class="nav-item"><a href="{{ url('perkembangan/evaluasi-tumbuh-kembang') }}" class="nav-link">Evaluasi Tumbuh Kembang</a></li>
                        <li class="nav-item"><a href="{{ url('perkembangan/pertumbuhan-absensi') }}" class="nav-link">Catatan Pertumbuhan & Absensi</a></li>                                             
                    </ul>
                </li>                
                <li class="nav-item"> <a href="{{ url('penilaian') }}" class="nav-link"><i class="icon-stats-dots"></i> <span>Penilaian</span></a> </li>
                <li class="nav-item"> <a href="{{ url('laporan') }}" class="nav-link"><i class="icon-file-text2"></i> <span>Laporan</span></a> </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-office"></i> <span>Pengaturan</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ url('pengaturan/tahun-ajaran') }}" class="nav-link">Tahun Ajaran</a></li>
                        <!-- <li class="nav-item"><a href="{{ url('perkembangan/evaluasi-tumbuh-kembang') }}" class="nav-link">Migrasi Kelas</a></li> -->
                        <li class="nav-item"> <a href="{{ url('profile') }}" class="nav-link"></i> <span>Profil PAUD</span></a> </li>
                    </ul>
                </li>                
                

            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->    
</div>