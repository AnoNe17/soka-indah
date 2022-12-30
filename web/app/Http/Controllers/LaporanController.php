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

class LaporanController extends Controller
{
    public function index()
    {
        // $listKelompok = MasterKelompok::get();
        // $listSiswa = MasterSiswa::get();            
        
        // $getSiswa = null;
        // if (isset($_GET['id_siswa'])){
        //     $getSiswa = MasterSiswa::find($_GET['id_siswa']);
        // }
        
        // return view('laporan.index',[
        //     'title' => 'Laporan',
        //     'getSiswa' => $getSiswa,
        //     'listKelompok' => $listKelompok,
        //     'listSiswa' => $listSiswa
        // ]);


        $getListKelompok = MasterKelompok::get();
        $getListSiswa = MasterSiswa::get();
        $getListPendidikanKarakter = MasterPendidikanKarakter::get();
        $getListEvaluasi = MasterEvaluasiTumbuhKembang::get();
        $getSiswa = null;
        $getDataSemester1 = [];
        $getDataSemester2 = [];
        $getnilai = [];
        if (isset($_GET['id_siswa'])){
            $getSiswa = MasterSiswa::find($_GET['id_siswa']);
            
            // $getDataSemester1 = DB::select("SELECT penilaian.*, detail_penilaian.ceklis, detail_penilaian.anekdot, detail_penilaian.hasil_karya, lingkup.nama FROM detail_penilaian JOIN lingkup ON detail_penilaian.id_lingkup=lingkup.id JOIN penilaian ON detail_penilaian.id_penilaian=penilaian.id_siswa WHERE penilaian.id_siswa=". $getSiswa->id." AND penilaian.semester= 1 GROUP BY penilaian.id");
            $getDataSemester1 = Penilaian::where('id_siswa', $getSiswa->id)
                ->where('semester', 1)
                ->orderBy('minggu_ke', 'ASC')
                // ->groupBy('minggu_ke')
                ->get();
            //     $id = Penilaian::where('id_siswa',$getSiswa->id)
            //     ->select('id')->get();
                // dd($minggu);
            // $getnilai = DB::table('penilaian')
            // ->join('detail_penilaian', 'detail_penilaian.id_penilaian', '=', 'penilaian.id_siswa')
            // ->where('detail_penilaian.id_penilaian', $getSiswa->id)
            
            // ->get();
            // dd($nilai);
            $getDataSemester2 = Penilaian::where('id_siswa', $getSiswa->id)
                ->where('semester', 2)
                ->orderBy('minggu_ke', 'ASC')
                ->get();    
            
        }
        
        
        return view('laporan.index', [
            'title' => 'Laporan',
            'listKelompok' => $getListKelompok,
            'listSiswa' => $getListSiswa,
            'listPendidikanKarakter' => $getListPendidikanKarakter,
            'getSiswa' => $getSiswa,
            'getDataSemester1' => $getDataSemester1,
            'getDataSemester2' => $getDataSemester2,
            // 'getnilai' => $nilai
        ]);    
    }

    public function detailLaporan(Request $request)
    {
        $request = $request->all();
        $getSiswa = MasterSiswa::find($request['id_siswa']);
        $listLingkup = Lingkup::with('KDIndikator')
            ->get();                

        return view('laporan.detail_laporan', [
            'title' => 'Laporan',
            'request' => $request,
            'getSiswa' => $getSiswa,
            'listLingkup' => $listLingkup
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

        return Redirect::to(url('laporan/detail-laporan?id_penilaian='.$data->id.'&minggu_ke='.$data->minggu_ke.'&id_siswa='.$data->id_siswa.'&nama_siswa='.$siswa->nama));
    }

    public function storeDetailLaporan(Request $request, $id = null)
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
        
        return Redirect::to(url('laporan/detail-laporan?id_penilaian='.$data->id_penilaian.'&minggu_ke='.$data->minggu_ke.'&id_siswa='.$request['id_siswa'].'&nama_siswa='.$request['nama_siswa']));
    }



    //EVALUASI TUMBUH KEMBANG//
    public function indexEvaluasi()
    {
        $getListKelompok = MasterKelompok::get();
        $getListSiswa = MasterSiswa::get();
        $getListEvaluasi = MasterEvaluasiTumbuhKembang::get();
        $getSiswa = null;
        if (isset($_GET['id_siswa'])){
            $getSiswa = MasterSiswa::find($_GET['id_siswa']);
        }
        
        return view('perkembangan/evaluasi-tumbuh-kembang.index',[
            'title' => 'Evaluasi Tumbuh Kembang',
            'listKelompok' => $getListKelompok,
            'listSiswa' => $getListSiswa,
            'getListEvaluasi' => $getListEvaluasi,
            'getSiswa' => $getSiswa
        ]);
    }

    public function storeEvaluasiTumbuhKembang(Request $request, $id = null)
    {
        $request = $request->all();                
        if (isset($request['b'])){            
            foreach ($request['b'] as $row){
                $b_ex = explode(', ', $row);
                $mstEvaluasiTumbuhKembangId = $b_ex[0];                
                // Check
                                
                $b = EvaluasiTumbuhKembang::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_evaluasi_tumbuh_kembang', $mstEvaluasiTumbuhKembangId)
                    ->first();
                
                if (empty($b)){
                    $b = new EvaluasiTumbuhKembang;
                }

                $b->id_siswa = $request['id_siswa'];
                $b->id_master_evaluasi_tumbuh_kembang = $mstEvaluasiTumbuhKembangId;
                $b->b = 1;
                $b->save();
            }
        }

        if (isset($request['c'])){            
            foreach ($request['c'] as $row){
                $c_ex = explode(', ', $row);
                $mstEvaluasiTumbuhKembangId = $c_ex[0];                
                $c = EvaluasiTumbuhKembang::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_evaluasi_tumbuh_kembang', $mstEvaluasiTumbuhKembangId)
                    ->first();
                if (empty($c)){
                    $c = new EvaluasiTumbuhKembang;
                }
                
                $c->id_siswa = $request['id_siswa'];
                $c->id_master_evaluasi_tumbuh_kembang = $mstEvaluasiTumbuhKembangId;
                $c->c = 1;
                $c->save();
            }
        }


        if (isset($request['k'])){            
            foreach ($request['k'] as $row){
                $k_ex = explode(', ', $row);
                $mstEvaluasiTumbuhKembangId = $k_ex[0];                
                $k = EvaluasiTumbuhKembang::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_evaluasi_tumbuh_kembang', $mstEvaluasiTumbuhKembangId)
                    ->first();
                if (empty($k)){
                    $k = new EvaluasiTumbuhKembang;
                }

                $k->id_siswa = $request['id_siswa'];
                $k->id_master_evaluasi_tumbuh_kembang = $mstEvaluasiTumbuhKembangId;
                $k->k = 1;
                $k->save();
            }
        }

        return Redirect::back();
    }
    
}
