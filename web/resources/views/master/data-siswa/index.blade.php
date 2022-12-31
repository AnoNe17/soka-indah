@extends('temp.index')
@section('content')
<!-- Main content -->

<!-- Content area -->
<div class="content">

    <!-- Single row selection -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Siswa</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('create-data-siswa') }}" class="btn btn-primary" title="Tambah"><i class="icon-add"></i> Tambah Siswa</a>
            <a href="{{ route('siswaexport') }}" class="btn btn-success" title="Tambah"> <i class="icon-file-text2"></i>Export</a>
            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="icon-copy"></i>Import</a>
        </div>
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
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no; }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jenis_kelamin }}</td>
                    <td>{{ $row->tanggal_lahir }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td><span class="badge {{ $row->status === 'Aktif' ? 'badge-success' : 'badge-danger'; }}">{{ $row->status }}</span></td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ url('master/data-siswa/create-password/'.$row->id) }}" class="dropdown-item"><i class="icon-key"></i>Ubah Password</a>
                                    <a href="{{ url('master/data-siswa/edit/'.$row->id) }}" class="dropdown-item"><i class="icon-pencil"></i>Edit</a>
                                    <a href="{{ url('master/data-siswa/delete/'.$row->id) }}" onclick="confirm('Apakah anda yakin ingin menghapus data ini?')" class="dropdown-item"><i class="icon-trash"></i>Delete</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('siswaimport') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                {{ csrf_field() }}
                <input type="file" name="file" required="required">
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- /content area -->

@endsection