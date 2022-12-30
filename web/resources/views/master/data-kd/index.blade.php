@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">
    <div class="form-group row">
        <div class="col-lg-4">        
            <span><a href="{{ url('master/data-kd/create') }}" class="btn btn-primary mb-2" title="Tambah"><i class="icon-add"></i> Tambah KD</a></span>
            <div class="input-group pull-right">
                <input type="text" class="form-control" placeholder="Right button">
                <span class="input-group-append">
                    <button class="btn btn-light" type="button">Button</button>
                </span>
            </div>
        </div>        
    </div>
    <!-- Single row selection -->
    @foreach ($listLingkup as $row)    
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">{{ $row->nama; }}</h5>
        </div>        
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>                        
                        <th width=5%>Kode</th>   
                        <th width=40%>Kompetensi Dasar</th>
                        <th width=10%>Action</th>
                        <th width=40$>Indikator</th>
                        <th width=5%>Action</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($row->KDIndikator as $kdIndikator)                    
                    <tr>
                        <td> <p style="font-size:9pt"> {{ $kdIndikator->kode }} </p></td>
                        <td> <p style="font-size:9pt;" > {{ $kdIndikator->nama_kd }} </p></td>
                        <td> <a href="#"> Edit  </a> | <a href="#" class="text-danger"> Delete </a></td>
                        <td> 
                            @if ($kdIndikator->Indikator)
                                @foreach ($kdIndikator->Indikator as $indikator)
                                <p style="font-size:9pt"> - {{ $indikator->nama_indikator }} </p>
                                @endforeach
                            @endif
                        </td>
                        <td> <a href="{{ url('master/data-kd/indikator/'.$kdIndikator->id) }}"> Edit  </a> </td>
                    </tr>                        
                @endforeach
                </tbody>
            </table>    
        </div>
    </div>
    @endforeach
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection