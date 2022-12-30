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
                <div class="col-md-7"> 
                    <div class="card p-3">
                        @if (isset($model))
                            <form method="post" action="{{url('penilaian/store-indikator/'.$model->id)}}">
                        @else
                            <form method="post" action="{{url('penilaian/store-indikator')}}">
                        @endif
                            @csrf
                            <input type="hidden" name="id_siswa" value="{{ $_GET['id_siswa'] }}">
                            <input type="hidden" name="nama_siswa" value="{{ $_GET['nama_siswa'] }}">
                            <input type="hidden" name="id_penilaian" value="{{ $_GET['id_penilaian'] }}">
                            <input type="hidden" name="id_lingkup" value="{{ $getLingkup->id }}">

                            <div class="form-group"> 
                                <label class="label"> Pilih KD </label>
                                <select class="form-control" name="kd" id="kd" onchange="getKdId()" required> 
                                    @if (isset($model))
                                        <option value="{{$model->KDIndikator->id}}"> {{ $model->KDIndikator->nama_kd }} </option>
                                    @else
                                        <option value=""> -- Pilih -- </option>
                                    @endif
                                    @foreach ($getKd as $row)
                                    <option value="{{$row->id}}"> {{ $row->nama_kd }}</option>
                                    @endforeach
                                </select>
                            </div>          
                            
                            <div class="ml-4">                            
                                <div class="form-group">
                                    <label class="label"> Pilih Indikator </label>
                                    <select class="form-control" name="indikator" required> 
                                        @if (isset($model))
                                        <option value="{{$model->Indikator->id}}"> {{ $model->Indikator->nama_indikator }} </option>
                                        @else
                                            <option value=""> -- Pilih -- </option>
                                        @endif
                                        @foreach ($getIndikator as $row)
                                        <option value="{{$row->id}}"> {{ $row->nama_indikator }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Ceklis </label>
                                            <select class="form-control" name="ceklis"> 
                                                @if (isset($model))
                                                    <option value="{{$model->ceklis}}"> {{ $model->ceklis }} </option>
                                                @else
                                                    <option value=""> -- Pilih -- </option>
                                                @endif                                                
                                                <option value="BB"> Belum Berkembang (BB) </option>
                                                <option value="MB"> Mulai Berkembang (MB) </option>
                                                <option value="BSH"> Berkembang Sesuai Harapan (BSH) </option>
                                                <option value="BSB"> Berkembang Sangat Baik (BSB) </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Anekdot </label>
                                            <select class="form-control" name="anekdot"> 
                                                @if (isset($model))
                                                    <option value="{{$model->anekdot}}"> {{ $model->anekdot }} </option>
                                                @else
                                                    <option value=""> -- Pilih -- </option>
                                                @endif                                                
                                                <option value="BB"> Belum Berkembang (BB) </option>
                                                <option value="MB"> Mulai Berkembang (MB) </option>
                                                <option value="BSH"> Berkembang Sesuai Harapan (BSH) </option>
                                                <option value="BSB"> Berkembang Sangat Baik (BSB) </option>
                                            </select>
                                        </div>
                                    </div>                
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Hasil Karya </label>
                                            <select class="form-control" name="hasil_karya"> 
                                                @if (isset($model))
                                                    <option value="{{$model->hasil_karya}}"> {{ $model->hasil_karya }} </option>
                                                @else
                                                    <option value=""> -- Pilih -- </option>
                                                @endif                                                
                                                <option value="BB"> Belum Berkembang (BB) </option>
                                                <option value="MB"> Mulai Berkembang (MB) </option>
                                                <option value="BSH"> Berkembang Sesuai Harapan (BSH) </option>
                                                <option value="BSB"> Berkembang Sangat Baik (BSB) </option>
                                            </select>
                                        </div>
                                    </div>                                                
                                </div>
                            </div>        
                            <button type="submit" class="btn btn-primary"> Simpan </button>  
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->
<script>
function getKdId() {
  var kdId = document.getElementById("kd").value;  
  if (kdId){
      $('#form-indikator').show();
  }
}
</script>

@endsection