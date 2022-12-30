@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Guru / Pengguna</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('create-data-pengguna') }}" class="btn btn-primary" title="Tambah"><i class="icon-add"></i> Tambah Pengguna</a>
        </div>
        <table class="table datatable-selection-single">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Guru</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $row)
                
                <tr>
                    <td>{{ $no; }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->telp }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td><span class="badge {{ $row->status === 'Aktif' ? 'badge-success' : 'badge-danger'; }}">{{ $row->status }}</span></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ url('master/data-pengguna/create-password/'.$row->id) }}" class="dropdown-item"><i class="icon-key"></i>Ubah Password</a>
                                    <a href="{{ url('master/data-pengguna/edit/'.$row->id) }}" class="dropdown-item"><i class="icon-pencil"></i>Edit</a>
                                    <a href="{{ url('master/data-pengguna/delete/'.$row->id) }}" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')" class="dropdown-item"><i class="icon-trash"></i>Delete</a>
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