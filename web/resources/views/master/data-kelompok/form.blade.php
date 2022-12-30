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
                <form method="POST" action="{{ url('master/data-kelompok/store') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-kelompok/store/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Kelompok</label>
                                <input type="text" class="form-control" name="nama_kelompok" value="{{ isset($model) ? $model->nama_kelompok : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kelompok Umur</label>
                                <input type="text" class="form-control" name="kelompok_umur" value="{{ isset($model) ? $model->kelompok_umur : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Wali Kelas</label>
                                <input type="text" class="form-control" name="wali_kelas" value="{{ isset($model) ? $model->wali_kelas : ''}}">
                            </div>                            
                        </div>
                        <div class="col-lg-8"></div>
                        <!-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Option groups support</label>
                                <select class="form-control multiselect" multiple="multiple" data-fouc>
                                    <optgroup label="Mathematics">
                                        <option value="analysis">Analysis</option>
                                        <option value="algebra">Linear Algebra</option>
                                        <option value="discrete">Discrete Mathematics</option>
                                    </optgroup>
                                    <optgroup label="Computer Science">
                                        <option value="programming">Introduction to Programming</option>
                                        <option value="complexity">Complexity Theory</option>
                                        <option value="software">Software Engineering</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-light"> Batal </button>
                    <button type="submit" class="btn btn-primary"> Simpan </button>
                </form>
            </fieldset>
        </div>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection