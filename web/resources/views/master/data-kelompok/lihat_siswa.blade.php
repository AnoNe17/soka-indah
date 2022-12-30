@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->

    <div class="card col-lg-12">        
        <div class="card-body">
            
            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold">Data Siswa</legend>
                @if (!isset($model))
                <form method="POST" action="{{ url('master/data-kelompok/store-lihat-siswa') }}" enctype="multipart/form-data"> 
                @else
                <form method="POST" action="{{ url('master/data-kelompok/store-lihat-siswa/'.$model->id) }}" enctype="multipart/form-data"> 
                @endif
                @csrf
                <table class="table datatable-selection-single">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach ($siswaKelompok as $row)
                <tr>
                    <td>{{ $no; }}</td>
                    <td>{{ $row->Siswa->nama }}</td>
                    <td>{{ $row->Siswa->jenis_kelamin }}</td>
                    <td>{{ $row->Siswa->tanggal_lahir }}</td>
                    <td>{{ $row->Siswa->alamat }}</td>
                    <td><span class="badge {{ $row->Siswa->status === 'Aktif' ? 'badge-success' : 'badge-danger'; }}">{{ $row->Siswa->status }}</span></td>
                    <td class="text-center">
                    <a href="{{ url('master/data-siswa/edit/'.$row->id) }}"> Detail </a>
                    </td>
                </tr>      
                @php $no++ @endphp             
                @endforeach             
            </tbody>
                </table>
                    <!-- <input type="hidden" value="{{ $model->id }}" name="id_kelompok"> -->
                    <!-- <div class="row">
                        
                        <div class="col-lg-8"></div>
                        <div class="col-lg-6">
                            <div class="card bg-light">
                                <ul class="media-list media-list-linked">
                                    <li><legend class="text-uppercase font-size-sm font-weight-bold p-2 mb-0">Siswa</legend>
                                    @foreach ($siswaKelompok as $row)
                                    <li>                                        
                                        <div class="media">                                            
                                            <div class="media-body">
                                                <div class="media-title">{{ $row->Siswa->nama }}</div>                                                
                                            </div>
                                            <div class="align-self-center ml-3">
                                                <a href="#" class="text-body" data-toggle="collapse" data-target="#james2">
                                                    <i class="icon-menu7"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="collapse" id="james2">
                                            <div class="card-body bg-light border-top border-bottom">
                                                <ul class="list list-unstyled mb-0">
                                                    <li><i class="icon-pin mr-2"></i>{{ $row->Siswa->alamat }}</li>
                                                    <li><i class="icon-phone mr-2"></i>{{ $row->Siswa->no_telp }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> 
                                    @endforeach                                                             	
                                </ul>
                            </div>
                        </div>
                    </div> -->
            </fieldset>
        </div>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection