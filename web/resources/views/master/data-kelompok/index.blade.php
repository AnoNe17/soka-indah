@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('create-data-kelompok') }}" class="btn btn-primary" title="Tambah"><i class="icon-add"></i> Tambah Kelompok</a>
        </div>
        <table class="table datatable-selection-single">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kelompok</th>
                    <th>Rentang Usia</th>
                    <th>Wali Kelas</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $row)
                
                <tr>
                    <td>{{ $no; }}</td>
                    <td>{{ $row->nama_kelompok }}</td>
                    <td>{{ $row->kelompok_umur }}</td>
                    <td>{{ $row->wali_kelas }}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ url('master/data-kelompok/pilih-siswa/'.$row->id) }}" class="dropdown-item"><i
                                                class="icon-list"></i>Pilih Siswa</a>
                                    <a href="{{ url('master/data-kelompok/lihat-siswa/'.$row->id) }}" class="dropdown-item"><i
                                                class="icon-user"></i>Lihat Siswa</a>
                                    <a href="{{ url('master/data-kelompok/edit/'.$row->id) }}" class="dropdown-item"><i
                                            class="icon-pencil"></i>Edit</a>
                                    <a href="{{ url('master/data-kelompok/delete/'.$row->id) }}" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')" class="dropdown-item">
                                        <i class="icon-trash"></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @php $no++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /single row selection -->
</div>
<!-- /content area -->

@endsection
