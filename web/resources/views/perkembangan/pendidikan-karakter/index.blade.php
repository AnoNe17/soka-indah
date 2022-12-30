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
            <form method="get" action="{{ url('perkembangan/pendidikan-karakter') }}">
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
                                        <option value=""> {{ $_GET['nama_siswa'] }} </option>                        
                                    @endif
                                    @foreach ($listSiswa as $row)
                                        <option value="{{ $row->id }}"> {{ $row->nama }} </option>
                                        <!-- <input type="hidden" name="nama_siswa" value="{{ $row->nama }}"> -->
                                    @endforeach
                                </select>
                                <!-- <span class="input-group-append">
                                    <a href="{{ url('perkembangan/pendidikan-karakter') }}" class="btn btn-light ml-2"><i class="icon-undo"></i><br></a>
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
            @if(isset($_GET['nama_siswa']) && isset($_GET['nama_kelompok']))
                <h5 class="card-title">{{ $_GET['nama_siswa'] }}</h5>                
            @endif
        </div>
        <div class="card-body"> 
            <form method="post" action="{{ url('perkembangan/pendidikan-karakter/store') }}">
                <div class="row"> 
                    @csrf                    
                    <input type="hidden" name="id_siswa" value="{{ $_GET['id_siswa'] }}">                    
                    <div class="col-md-5"> 
                        <table class="table table-bordered"> 
                            <thead class="bg-warning"> 
                                <tr> 
                                    <td> Pendidikan Karakter </td>
                                    <td class="text-center" width=4%> BM </td>
                                    <td class="text-center" width=4%> KM </td>
                                    <td class="text-center" width=4%> SM </td>
                                    <td class="text-center" width=4%> K </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listPendidikanKarakter as $row)
                                @php
                                    $pendidikanKarakter = App\Models\PendidikanKarakter::where('id_master_pendidikan_karakter', $row->id)
                                        ->where('id_siswa', $getSiswa->id)
                                        ->first();  

                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                    if ($pendidikanKarakter){
                                        if ($pendidikanKarakter->bm){
                                            $bm = 'checked';
                                        }

                                        if ($pendidikanKarakter->km){
                                            $km = 'checked';
                                        }

                                        if ($pendidikanKarakter->sm){
                                            $sm = 'checked';
                                        }

                                        if ($pendidikanKarakter->k){
                                            $k = 'checked';
                                        }
                                    }
                                    
                                @endphp
                                
                                <tr> 
                                    <td> {{ $row->nama }} </td>
                                    <td> 
                                        <label class="custom-control custom-control-secondary custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input" name="bm[]" value="{{ $row->id.', '.$row->nama }}" <?php echo $bm ?>>
                                            <span class="custom-control-label"></span>
                                        </label>     
                                    </td>
                                    <td> 
                                        <label class="custom-control custom-control-secondary custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input" name="km[]" value="{{ $row->id.', '.$row->nama }}" <?php echo $km ?>>
                                            <span class="custom-control-label"></span>
                                        </label>     
                                    </td>
                                    <td> 
                                        <label class="custom-control custom-control-secondary custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input" name="sm[]" value="{{ $row->id.', '.$row->nama }}" <?php echo $sm ?>>
                                            <span class="custom-control-label"></span>
                                        </label>     
                                    </td>
                                    <td> 
                                        <label class="custom-control custom-control-secondary custom-checkbox ml-2">
                                            <input type="checkbox" class="custom-control-input" name="k[]" value="{{ $row->id.', '.$row->nama }}" <?php echo $k ?>>
                                            <span class="custom-control-label"></span>
                                        </label>     
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"> Simpan </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <table class="table table-bordered"> 
                                <thead class="bg-secondary text-white"> 
                                    <tr> 
                                        <td class="text-center" width=4%> Skor </td>
                                        <td class="text-center" width=4%> Keterangan </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr> 
                                        <td> BM </td>
                                        <td> Belum Muncul </td>
                                    </tr>
                                    <tr> 
                                        <td> KM </td>
                                        <td> Kadang Muncul </td>
                                    </tr>
                                    <tr> 
                                        <td> SM </td>
                                        <td> Sering Muncul </td>
                                    </tr>
                                    <tr> 
                                        <td> K </td>
                                        <td> Konsisten </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <br>
                            <div class="form-group">
                                <label class="label"> Catatan </label>
                                <textarea class="form-control" name="catatan"></textarea>
                            </div> -->
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