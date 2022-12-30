@extends('temp.index')
@section('content')
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="col-xl-5">            
            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title text-center"><b>PROFILE PAUD</b></h6>                    
                </div>

                <div class="card-body py-0">
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="align-items-center justify-content-center mb-2 text-center">                                
                                <div class="col-md-4" style="margin:0 auto;">    
                                    <img src="{{asset('img/logo.png')}}" style="max-width:100%; max-height:100%">
                                </div>                                
                            </div>                           
                            <table class="table">
                                <tr>
                                    <td>Nama PAUD</td>
                                    <td>{{ $profile->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Program PAUD</td>
                                    <td>{{ $profile->program }}</td>
                                </tr>
                                <tr>
                                    <td>NPSN</td>
                                    <td>{{ $profile->npsn }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $profile->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>{{ $profile->kelurahan }}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>{{ $profile->kecamatan }}</td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td>{{ $profile->kabupaten }}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>{{ $profile->provinsi }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /traffic sources -->

        </div>

        <div class="col-md-7">

            <!-- Sales stats -->
            <div class="card">
                <!-- <div class="card-header header-elements-sm-inline py-sm-0">
                    <h6 class="card-title py-sm-3">Sales statistics</h6>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">                        
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ $totalGuru }}</h3>
                                        <div class="list-icons ml-auto">
                                            <a class="list-icons-item" data-action="reload"></a>
                                        </div>
                                    </div>                                    
                                    <div>
                                        Jumlah Guru
                                        <div class="font-size-sm opacity-75">&nbsp;</div>
                                    </div>                                                                        
                                </div>
                                <div id="today-revenue"></div>
                            </div>                    
                        </div>
                        <div class="col-md-4">                        
                            <div class="card bg-teal text-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ $totalKelompok }}</h3>
                                        <div class="list-icons ml-auto">
                                            <a class="list-icons-item" data-action="reload"></a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        Jumlah Kelompok
                                        <div class="font-size-sm opacity-75">&nbsp;</div>
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>                    
                        </div>
                        <div class="col-md-4">                        
                            <div class="card bg-pink text-white">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">{{ $totalSiswa }}</h3>
                                        <div class="list-icons ml-auto">
                                            <a class="list-icons-item" data-action="reload"></a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        Jumlah Siswa
                                        <div class="font-size-sm opacity-75">Aktif : </div>
                                    </div>
                                </div>
                                <div id="today-revenue"></div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- /sales stats -->

        </div>
    </div>
</div>
@endsection