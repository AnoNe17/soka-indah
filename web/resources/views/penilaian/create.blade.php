@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="">Nama Siswa</label>
                        <input type="text" class="form-control" value="{{ $getSiswa->nama }}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="">Kelompok</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="card-header text-center bg-primary text-white mb-3">
                Masukan Data
            </div>
            <form method="post" action="{{ url('penilaian/store') }}">
                @csrf                    
                <input type="hidden" name="id_siswa" value="{{ $getSiswa->id }}">
                <div class="row"> 
                    <div class="col-md-4" > 
                        <div class="form-group">
                            <label class="label"> Semester </label>
                            <input type="number" class="form-control" name="semester" value="{{ $_GET['semester'] }}" readonly> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Minggu Ke </label>
                            <input type="number" class="form-control" name="minggu_ke" value=""> 
                        </div>                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="label"> Tema </label>
                            <input type="text" class="form-control" name="tema" value=""> 
                        </div>

                        <div class="form-group">
                            <label class="label"> Sub Tema </label>
                            <input type="text" class="form-control" name="sub_tema" value=""> 
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group">
                            <label class="label"> Tanggal </label>
                            <input type="date" class="form-control" name="tanggal" value=""> 
                        </div>                                                
                    </div>
                    <div class="mt-3 ml-2">
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection