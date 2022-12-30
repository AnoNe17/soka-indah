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
                <form method="POST" action="{{ url('pengaturan/tahun-ajaran/store') }}"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Tahun Ajaran</label>
                                <input type="text" class="form-control" name="tahun_ajaran" value="{{ isset($model) ? $model->tahun_ajaran : ''}}" required>
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