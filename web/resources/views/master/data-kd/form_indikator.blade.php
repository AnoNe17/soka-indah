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
                <form method="POST" action="{{ url('master/data-kd/store-indikator') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-kd/store-indikator/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <input type="hidden" value="{{ $data->id }}" name="id_kd_indikator">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Kelompok</label>
                                <select class="form-control" name="id_kelompok" disabled>
                                    <option value=""> {{ $data->Kelompok->nama_kelompok }} </option>
                                </select>                                
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Lingkup</label>
                                <select class="form-control" name="id_kelompok" disabled>
                                    <option value=""> {{ $data->Lingkup->nama }} </option>
                                </select>                                
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{ $data->kode }}" disabled>   
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kompetensi Dasar</label>
                                <textarea class="form-control" name="nama_kd" disabled> {{ $data->nama_kd }}  </textarea>                             
                            </div>

                            <div class="form-group">
                                <label>Indikator</label>
                                <input type="text" class="form-control tokenfield-primary" name="indikator" data-fouc>
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