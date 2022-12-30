<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterSiswa;
use App\Models\MasterPengguna;
use App\Models\MasterKelompok;
use App\Models\MasterKelompokDetail;
use App\Models\KDIndikator;
use App\Models\Indikator;
use App\Models\Lingkup;
use App\Models\MasterPendidikanKarakter;
use App\Models\MasterEvaluasiTumbuhKembang;
use App\Models\PendidikanKarakter;
use App\Models\EvaluasiTumbuhKembang;
use App\Models\PertumbuhanAbsensi;
use App\Models\Penilaian;
use App\Models\DetailPenilaian;
use Redirect;
use Hash;
use DB;
use Carbon\Carbon;

class PenilaianController extends Controller
{
    public function index()
    {
        $getListKelompok = MasterKelompok::get();
        $getListSiswa = MasterSiswa::get();
        $getListPendidikanKarakter = MasterPendidikanKarakter::get();
        $getSiswa = null;
        $getDataSemester1 = [];
        $getDataSemester2 = [];
        if (isset($_GET['id_siswa'])){
            $getSiswa = MasterSiswa::find($_GET['id_siswa']);
            
            $getDataSemester1 = Penilaian::where('id_siswa', $getSiswa->id)
                ->where('semester', 1)
                ->orderBy('minggu_ke', 'ASC')
                // ->groupBy('minggu_ke')
                ->get();

            $getDataSemester2 = Penilaian::where('id_siswa', $getSiswa->id)
                ->where('semester', 2)
                ->orderBy('minggu_ke', 'ASC')
                ->get();            
            
        }
        
        return view('penilaian.index', [
            'title' => 'Penilaian',
            'listKelompok' => $getListKelompok,
            'listSiswa' => $getListSiswa,
            'listPendidikanKarakter' => $getListPendidikanKarakter,
            'getSiswa' => $getSiswa,
            'getDataSemester1' => $getDataSemester1,
            'getDataSemester2' => $getDataSemester2
        ]);
    }

    public function create($id)
    {        
        $getSiswa = MasterSiswa::find($id);       
        return view('penilaian.create', [
            'title' => 'Penilaian',
            'getSiswa' => $getSiswa,
            
        ]);
    }

    public function penilaianKdIndikator(Request $request)
    {
        $request = $request->all();
        $getSiswa = MasterSiswa::find($request['id_siswa']);
        $listLingkup = Lingkup::with('KDIndikator')
            ->get();                

        return view('penilaian.kd-indikator', [
            'title' => 'Penilaian',
            'request' => $request,
            'getSiswa' => $getSiswa,
            'listLingkup' => $listLingkup
        ]);
    }

    public function penilaianKdIndikatorCreate($id_lingkup)
    {
        
        $getLingkup = Lingkup::find($id_lingkup);
        $getSiswa = MasterSiswa::find($_GET['id_siswa']);
        $getKd = KDIndikator::where('id_lingkup', $id_lingkup)->get();        
        $getIndikator = Indikator::get();
        // $getIndikator = [];

        return view('penilaian.kd-indikator-create', [
            'title' => 'Penilaian',        
            'getSiswa' => $getSiswa,
            'getKd' => $getKd,
            'getIndikator' => $getIndikator,
            'getLingkup' => $getLingkup,
        ]);
    }

    public function penilaianKdIndikatorEdit($id)
    {
        
        $model = DetailPenilaian::find($id);
        $getLingkup = Lingkup::find($model->id_lingkup);
        $getSiswa = MasterSiswa::find($_GET['id_siswa']);
        $getKd = KDIndikator::where('id_lingkup', $model->id_lingkup)->get();        
        $getIndikator = Indikator::get();

        return view('penilaian.kd-indikator-create', [
            'title' => 'Penilaian',        
            'getSiswa' => $getSiswa,
            'getKd' => $getKd,
            'getIndikator' => $getIndikator,
            'getLingkup' => $getLingkup,
            'model' => $model,
        ]);
    }

    public function store(Request $request, $id = null)
    {
        $request = $request->all();
        
        $siswa = MasterSiswa::find($request['id_siswa']);
        $data = new Penilaian;

        $data->id_siswa = $request['id_siswa'];
        $data->tema = $request['tema'];
        $data->sub_tema = $request['sub_tema'];
        $data->minggu_ke = $request['minggu_ke'];
        $data->semester = $request['semester'];
        $data->tanggal = $request['tanggal'];
        $data->save();

        return Redirect::to(url('penilaian/kd-indikator?id_penilaian='.$data->id.'&minggu_ke='.$data->minggu_ke.'&id_siswa='.$data->id_siswa.'&nama_siswa='.$siswa->nama));
    }

    public function storePenilaianIndikator(Request $request, $id = null)
    {
        $request = $request->all();        
        
        $data = DetailPenilaian::find($id);
        if (!$data){
            $data = new DetailPenilaian;
        }        
        
        $data->id_penilaian = $request['id_penilaian'];
        $data->id_lingkup = $request['id_lingkup'];
        $data->id_kd_indikator = $request['kd'];
        $data->id_indikator = $request['indikator'];
        $data->ceklis = $request['ceklis'];
        $data->anekdot = $request['anekdot'];
        $data->hasil_karya = $request['hasil_karya'];
        $data->save();
        
        return Redirect::to(url('penilaian/kd-indikator?id_penilaian='.$data->id_penilaian.'&minggu_ke='.$data->minggu_ke.'&id_siswa='.$request['id_siswa'].'&nama_siswa='.$request['nama_siswa']));
    }
}
