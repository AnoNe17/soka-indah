@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->

    <div class="card col-lg-12">        
        <div class="card-body">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Form</legend>
                @if (!isset($model))
                <form method="POST" action="{{ url('master/data-kelompok/store-pilih-siswa') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-kelompok/store-pilih-siswa/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <!-- <input type="hidden" value="{{ $model->id }}" name="id_kelompok"> -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Kelompok</label>
                                <input type="text" class="form-control" name="nama_kelompok" value="{{ isset($model) ? $model->nama_kelompok : ''}}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kelompok Umur</label>
                                <input type="text" class="form-control" name="kelompok_umur" value="{{ isset($model) ? $model->kelompok_umur : ''}}" disabled>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Wali Kelas</label>
                                <input type="text" class="form-control" name="wali_kelas" value="{{ isset($model) ? $model->wali_kelas : ''}}" disabled>
                            </div>                            
                        </div>
                        <div class="col-lg-8"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Siswa</label>
                                <select class="form-control multiselect" multiple="multiple" name="id_siswa[]" data-fouc>
                                    <optgroup label="">
                                        @foreach ($listSiswa as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="card bg-light">
                                <ul class="media-list media-list-linked">
                                    <li><legend class="text-uppercase font-size-sm font-weight-bold p-2 mb-0">Siswa</legend>
                                    @foreach ($siswaKelompok as $row)
                                    <li>                                        
                                        <div class="media">                                            
                                            <div class="media-body">
                                                <div class="media-title">{{ $row->Siswa->nama }}</div>                                                
                                            </div>
                                            <div class="align-self-center ml-3">
                                                <a href="#" class="text-body" data-toggle="collapse" data-target="#james2">
                                                    <i class="icon-menu7"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="collapse" id="james2">
                                            <div class="card-body bg-light border-top border-bottom">
                                                <ul class="list list-unstyled mb-0">
                                                    <li><i class="icon-pin mr-2"></i>{{ $row->Siswa->alamat }}</li>
                                                    <li><i class="icon-phone mr-2"></i>{{ $row->Siswa->no_telp }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> 
                                    @endforeach                                                             	
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('master/data-kelompok') }}" type="submit" class="btn btn-light"> Batal </a>
                    <button type="submit" class="btn btn-primary"> Simpan </button>
                </form>
            </fieldset>
        </div>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection