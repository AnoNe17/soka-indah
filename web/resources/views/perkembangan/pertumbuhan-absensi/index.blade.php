@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form method="get" action="{{ url('perkembangan/pertumbuhan-absensi') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="">Kelompok</label>
                            <select class="form-control" name="nama_kelompok">
                                @if (!isset($_GET['nama_kelompok']))
                                    <option value=""> -- Pilih -- </option>                        
                                @else
                                    <option value=""> {{ $_GET['nama_kelompok'] }} </option>                        
                                @endif
                                @foreach ($listKelompok as $row)
                                <option value="{{ $row->nama_kelompok }}"> {{ $row->nama_kelompok }} </option>                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="">Nama Siswa</label>
                            <div class="input-group">
                                <select class="form-control" name="id_siswa">
                                    @if (!isset($_GET['nama_siswa']))
                                        <option value=""> -- Pilih -- </option>                        
                                    @else
                                        <option value=""> {{ $_GET['nama_siswa'] }} </option>                        
                                    @endif
                                    @foreach ($listSiswa as $row)
                                        <option value="{{ $row->id }}"> {{ $row->nama }} </option>
                                        <!-- <input type="hidden" name="nama_siswa" value="{{ $row->nama }}"> -->
                                    @endforeach
                                </select>
                                <!-- <span class="input-group-append">
                                    <a href="{{ url('perkembangan/pertumbuhan-absensi') }}" class="btn btn-light ml-2"><i class="icon-undo"></i><br></a>
                                </span> -->
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"> Tampilkan </button>
            </form>
        </div>
    </div>

    @if ($getSiswa)
    <div class="card">
        <div class="card-header"> 
            @if(isset($_GET['nama_siswa']) && isset($_GET['nama_kelompok']))
                <h5 class="card-title">{{ $_GET['nama_siswa'] }}</h5>                
            @endif
        </div>
        <div class="card-body"> 
            <form method="post" action="{{ url('perkembangan/pertumbuhan-absensi/store') }}">
                <div class="row"> 
                    @csrf                    
                    <input type="hidden" name="id_siswa" value="{{ $_GET['id_siswa'] }}">                    
                    <div class="col-md-4" > 
                        <div class="form-group">
                            <label class="label"> Berat Badan (Kg) </label>
                            <input type="number" class="form-control" name="berat_badan" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->berat_badan : '' }}"> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Tinggi Badan (Cm) </label>
                            <input type="number" class="form-control" name="tinggi_badan" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->tinggi_badan : '' }}"> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Lingkar Kepala (Cm) </label>
                            <input type="number" class="form-control" name="lingkar_kepala" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->lingkar_kepala : '' }}"> 
                        </div>                                                
                    </div>
                    <div class="col-md-4" style="border-right: 1px solid #d4d4d4">
                        <div class="form-group">
                            <label class="label"> Sakit </label>
                            <input type="number" class="form-control" name="sakit" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->sakit : '' }}"> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Izin </label>
                            <input type="number" class="form-control" name="izin" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->izin : '' }}"> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Tanpa Keterangan </label>
                            <input type="number" class="form-control" name="tanpa_keterangan" value="{{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->tanpa_keterangan : '' }}"> 
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="label"> Catatan </label>
                            <textarea class="form-control" name="catatan"> {{ isset($getPertumbuhanAbsensi) ? $getPertumbuhanAbsensi->catatan : '' }} </textarea> 
                        </div>
                    </div>
                    <div class="mt-3 ml-2">
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    @endif
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection