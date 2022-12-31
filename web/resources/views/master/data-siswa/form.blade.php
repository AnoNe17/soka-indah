@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->

    <div class="card">        
        <div class="card-body">
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Form</legend>
                @if (!isset($model))
                <form method="POST" action="{{ url('master/data-siswa/store') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-siswa/store/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Siswa</label>
                                <input type="text" class="form-control" required name="nama_siswa" value="{{ isset($model) ? $model->nama : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Nama Panggilan</label>
                                <input type="text" class="form-control" name="nama_panggilan" value="{{ isset($model) ? $model->nama_panggilan : ''}}">
                            </div>

                            <!-- {{-- NOMOR INDUK OTOMATIS --}}
                            @php
                                $date = new DateTime();
                                $result = $date->format('Y');

                                $jumlah =  sprintf("%02d", $jumlah_siswa + 1);
                                $nis = $result . $jumlah;
                                // echo $nis;
                            @endphp -->
                            <div class="form-group">
                                <label class="col-form-label">No. Induk</label>
                                <input type="text" class="form-control" value="{{ isset($model) ? $model->no_induk : $nis}}" disabled>
                                <input type="hidden" class="form-control" name="no_induk" value="{{ isset($model) ? $model->no_induk : $nis}}" >
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Tanggal Lahir</label>                                
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" name="tanggal_lahir" class="form-control pickadate rounded-right" value="{{ isset($model) ? $model->tanggal_lahir : ''}}" placeholder="dd-mm-yyyy" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    @if(isset($model))
                                    <option value="{{ $model->jenis_kelamin }}"> {{ $model->jenis_kelamin }} </option>                                        
                                    @else
                                    <option value=""> -- Pilih -- </option>
                                    @endif
                                    <option value="Laki - Laki"> Laki - Laki </option>
                                    <option value="Perempuan"> Perempuan </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="col-form-label">Agama</label>
                                <input type="text" class="form-control" name="agama" value="{{ isset($model) ? $model->agama : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Anak ke</label>
                                <input type="text" class="form-control" name="anak_ke" value="{{ isset($model) ? $model->anak_ke : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Kelompok</label>
                                <select class="form-control" name="kelompok_umur">
                                    <option value=""> -- Pilih -- </option>
                                    @foreach ($kelompoks as $kelompok)
                                        <option value="{{ $kelompok->id }}">{{ $kelompok->nama_kelompok }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" required name="kelompok_umur" value="{{ isset($model) ? $model->id_kelompok : ''}}"> --}}
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Tanggal Diterima</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                    </span>
                                    <input type="text" name="tanggal_diterima" class="form-control pickadate rounded-right" value="{{ isset($model) ? $model->tanggal_diterima : ''}}" placeholder="dd-mm-yyyy" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status">
                                    @if(isset($model))
                                    <option value="{{ $model->status }}"> {{ $model->status }} </option>                                        
                                    @endif
                                    <option value="Aktif"> Aktif </option>
                                    <option value="Non Aktif"> Non Aktif </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="col-form-label">Nama Orang tua / Wali</label>
                                <input type="text" class="form-control" name="nama_wali" value="{{ isset($model) ? $model->nama_wali : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Pekerjaan Orang tua / Wali</label>
                                <input type="text" class="form-control" name="pekerjaan_wali" value="{{ isset($model) ? $model->pekerjaan_wali : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">No. Telp</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ isset($model) ? $model->no_telp : ''}}">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat" value="{{ isset($model) ? $model->alamat : ''}}">
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" value="{{ isset($model) ? $model->foto : ''}}">
                            </div> -->
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