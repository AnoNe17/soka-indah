@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->

    <div class="card col-lg-4">        
        <div class="card-body">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Form</legend>
                <form method="POST" action="{{ url('profile/store') }}"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Nama PAUD</label>
                                <input type="text" class="form-control" name="nama" value="{{ isset($model) ? $model->nama : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Program PAUD</label>
                                <input type="text" class="form-control" name="program" value="{{ isset($model) ? $model->program : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">NPSN</label>
                                <input type="text" class="form-control" name="npsn" value="{{ isset($model) ? $model->npsn : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ isset($model) ? $model->alamat : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" value="{{ isset($model) ? $model->kelurahan : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" value="{{ isset($model) ? $model->kecamatan : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kabupaten / Kota</label>
                                <input type="text" class="form-control" name="kabupaten" value="{{ isset($model) ? $model->kabupaten : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Provinsi</label>
                                <input type="text" class="form-control" name="provinsi" value="{{ isset($model) ? $model->provinsi : ''}}" required>
                            </div>
                        </div>
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