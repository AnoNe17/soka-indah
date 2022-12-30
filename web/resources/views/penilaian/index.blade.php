@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form method="get" action="{{ url('penilaian') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="">Kelompok</label>
                            <select class="form-control" name="nama_kelompok">
                                @if (!isset($_GET['nama_kelompok']))
                                    <option value=""> -- Pilih -- </option>                        
                                @else
                                    <option value=""> {{ $_GET['nama_kelompok'] }} </option>                        
                                @endif
                                @foreach ($listKelompok as $row)
                                    <option value="{{ $row->nama_kelompok }}"> {{ $row->nama_kelompok }} </option>                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="">Nama Siswa</label>
                            <div class="input-group">
                                <select class="form-control" name="id_siswa">
                                    @if (!isset($_GET['nama_siswa']))
                                        <option value=""> -- Pilih -- </option>                        
                                    @else
                                        <option value="{{$_GET['id_siswa']}}"> {{ $_GET['nama_siswa'] }} </option>                        
                                    @endif
                                    @foreach ($listSiswa as $row)
                                        <option value="{{ $row->id }}"> {{ $row->nama }} </option>
                                        <!-- <input type="hidden" name="nama_siswa" value="{{ $row->nama }}"> -->
                                    @endforeach
                                </select>
                                <!-- <span class="input-group-append">
                                    <a href="{{ url('penilaian') }}" class="btn btn-light ml-2"><i class="icon-undo"></i><br></a>
                                </span> -->
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"> Tampilkan </button>
            </form>
        </div>
    </div>

    @if ($getSiswa)
    <div class="card">
        <div class="card-header"> 
            
        </div>
        <div class="card-body"> 
            <form method="post" action="{{ url('penilaian/store') }}">
                <div class="row"> 
                    @csrf                    
                    <input type="hidden" name="id_siswa" value="{{ $_GET['id_siswa'] }}">                    
                    <div class="col-md-12">
                        <table class="table table-bordered"> 
                            <thead class="bg-primary text-white"> 
                                <tr> 
                                    <th colspan=5 class="text-center"> Semester 1 </th> 
                                </tr>
                                <tr> 
                                    <th width=10%> Minggu ke </th>
                                    <th> Tema </th>
                                    <th> Sub Tema </th>
                                    <th> Tanggal </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($getDataSemester1 as $row)
                                <tr> 
                                    <td> {{ $row->minggu_ke }} </td>
                                    <td> {{ $row->tema }} </td>
                                    <td> {{ $row->sub_tema }} </td>
                                    <td> {{ date('d F Y', strtotime($row->tanggal)) }} </td>
                                    <td class="text-center"> 
                                        <a href="{{url('penilaian/kd-indikator?id_penilaian='.$row->id.'&minggu_ke='.$row->minggu_ke.'&id_siswa='.$getSiswa->id.'&nama_siswa='.$getSiswa->nama)}}" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <a href="{{ url('penilaian/create/id/'.$getSiswa->id.'?semester=1') }}" class="btn btn-success"> Tambah </a>
                        </div>
                    </div>                    
                </div>
            </form>

            <form method="post" action="{{ url('penilaian/store') }}" class="mt-5">
                <div class="row"> 
                    @csrf                    
                    <input type="hidden" name="id_siswa" value="{{ $_GET['id_siswa'] }}">                    
                    <div class="col-md-12">
                        <table class="table table-bordered"> 
                            <thead class="bg-primary text-white"> 
                                <tr> 
                                    <th colspan=5 class="text-center"> Semester 2 </th> 
                                </tr>
                                <tr> 
                                    <th width=10%> Minggu ke </th>
                                    <th> Tema </th>
                                    <th> Sub Tema </th>
                                    <th> Tanggal </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($getDataSemester2 as $row)
                                <tr> 
                                    <td> {{ $row->minggu_ke }} </td>
                                    <td> {{ $row->tema }} </td>
                                    <td> {{ $row->sub_tema }} </td>
                                    <td> {{ date('d F Y', strtotime($row->tanggal)) }} </td>
                                    <td class="text-center"> 
                                        <a href="#" class="btn btn-warning btn-sm"><i class="icon-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="icon-trash" onclick="confirm('Apakah anda yakin ingin menghapus data ini ?')"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <a href="{{ url('penilaian/create/id/'.$getSiswa->id.'?semester=2') }}" class="btn btn-success"> Tambah </a>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        
    </div>
    @endif
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection