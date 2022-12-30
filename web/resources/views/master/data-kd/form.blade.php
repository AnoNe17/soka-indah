@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->

    <div class="card col-lg-5">        
        <div class="card-body">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Form</legend>
                @if (!isset($model))
                <form method="POST" action="{{ url('master/data-kd/store') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-kd/store/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Kelompok</label>
                                <select class="form-control" name="id_kelompok">
                                    <option value=""> -- Select -- </option>
                                    @foreach ($listKelompok as $row)
                                    <option value="{{ $row->id }}"> {{ $row->nama_kelompok }} </option>
                                    @endforeach
                                </select>                                
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Pilih Lingkup</label>
                                <select class="form-control" name="id_lingkup">
                                    <option value=""> -- Select -- </option>
                                    @foreach ($listLingkup as $row)
                                    <option value="{{ $row->id }}"> {{ $row->nama }} </option>
                                    @endforeach
                                </select>                                
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kode</label>
                                <input type="text" class="form-control" name="kode">   
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kompetensi Dasar</label>
                                <textarea class="form-control" name="nama_kd"> </textarea>                             
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('master/data-kd') }}"  class="btn btn-light"> Batal </a>
                    <button type="submit" class="btn btn-primary"> Simpan </button>
                </form>
            </fieldset>
        </div>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection