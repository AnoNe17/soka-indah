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
            </div>
            <div class="col-md-12"> 
                <div class="card p-3">
                @foreach ($listLingkup as $row)                    
                    @php
                        $detailPenilaian = App\Models\DetailPenilaian::where('id_lingkup', $row->id)
                            ->where('id_penilaian', $_GET['id_penilaian'])
                            ->first();   
                    @endphp
                    <!-- <div class="card-header text-center">
                        <h5 class="card-title"><b>{{ $row->nama; }}</b></h5>                        
                    </div>         -->
                    @if ($detailPenilaian)
                        <!-- <div class="card-body border">     -->
                            <div class="col-md">
                                <table class="table table-bordered"> 
                                    <thead> 
                                        <tr class="bg-primary">
                                            <th colspan=5 >{{ $row->nama; }}</th>
                                        </tr>
                                        <tr>
                                            <th width=50%> Kompetensi Dasar </th>
                                            <th > Indikator </th>
                                            <th width=10%> Ceklis </th>
                                            <th width=10%> Anekdot </th>
                                            <th width=10%> Hasil Karya </th>
                                        </tr>
                                        <br> 
                                    </thead>
                                    <tbody> 
                                        
                                            
                                        <tr>  
                                            <td> {{$detailPenilaian->KDIndikator->kode}} - {{$detailPenilaian->KDIndikator->nama_kd}} </td>
                                            <td> {{$detailPenilaian->Indikator->nama_indikator}} </td>
                                            <td> {{ $detailPenilaian->ceklis }} </td>
                                            <td> {{ $detailPenilaian->anekdot }} </td>
                                            <td> {{ $detailPenilaian->hasil_karya }} </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>                     
                                <!-- <div class="form-group mt-2"> 
                                    <label class="label"> <b>KD Indikator</b> </label>  
                                    <div class="card bg-light p-3">                          
                                        {{$detailPenilaian->KDIndikator->kode}} - {{$detailPenilaian->KDIndikator->nama_kd}} <br>                                        
                                    </div>
                                </div>
                                <div class="ml-4"> 
                                    <div class="form-group mt-2"> 
                                        <label class="label"> <b>Indikator</b> </label>  
                                        <div class="card bg-light p-3">                          
                                            {{$detailPenilaian->Indikator->nama_indikator}}
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Ceklis </label>
                                            <select class="form-control" name="ceklis" readonly> 
                                                <option value=""> {{ $detailPenilaian->ceklis }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Anekdot </label>
                                            <select class="form-control" name="anekdot" readonly> 
                                                <option value=""> {{ $detailPenilaian->anekdot }}</option>
                                            </select>
                                        </div>
                                    </div>                
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <label class="label"> * Hasil Karya </label>
                                            <select class="form-control" name="hasil_karya" readonly> 
                                                <option value=""> {{ $detailPenilaian->hasil_karya }}</option>
                                            </select>
                                        </div>
                                    </div>                                                
                                </div> -->
                                <!-- </div> -->
                            </div>
                        <!-- </div> -->
                        @endif
                    @endforeach          
                </div>
            </div>            
        </div>
    </div>

    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection