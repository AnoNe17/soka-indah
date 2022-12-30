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
                @if (!isset($model))
                <form method="POST" action="{{ url('master/data-pengguna/store') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-pengguna/store/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Nama Guru</label>
                                <input type="text" class="form-control" name="nama" value="{{ isset($model) ? $model->nama : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ isset($model) ? $model->email : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">No. Telp</label>
                                <input type="text" class="form-control" name="telp" value="{{ isset($model) ? $model->telp : ''}}" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" required>{{ isset($model) ? $model->alamat : ''}}</textarea>                             
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="Aktif"> Aktif </option>
                                    <option value="Non Aktif"> Non Aktif </option>
                                </select>                                
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