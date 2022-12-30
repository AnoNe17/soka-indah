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
use Redirect;
use Hash;
use Carbon\Carbon;

class PerkembanganController extends Controller
{
    //PENDIDIKAN KARAKTER//
    public function index()
    {
        $getListKelompok = MasterKelompok::get();
        $getListSiswa = MasterSiswa::get();
        $getListPendidikanKarakter = MasterPendidikanKarakter::get();
        $getSiswa = null;
        if (isset($_GET['id_siswa'])){
            $getSiswa = MasterSiswa::find($_GET['id_siswa']);
        }
        
        return view('perkembangan/pendidikan-karakter.index',[
            'title' => 'Pendidikan Karakter',
            'listKelompok' => $getListKelompok,
            'listSiswa' => $getListSiswa,
            'listPendidikanKarakter' => $getListPendidikanKarakter,
            'getSiswa' => $getSiswa
        ]);
    }

    public function store(Request $request, $id = null)
    {
        $request = $request->all();        
        if (isset($request['bm'])){            
            foreach ($request['bm'] as $row){
                $bm_ex = explode(', ', $row);
                $mstPendidikanKarakterId = $bm_ex[0];                
                // Check
                
                $bm = PendidikanKarakter::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_pendidikan_karakter', $mstPendidikanKarakterId)
                    ->first();
                if (empty($bm)){
                    $bm = new PendidikanKarakter;
                }

                $bm->id_siswa = $request['id_siswa'];
                $bm->id_master_pendidikan_karakter = $mstPendidikanKarakterId;
                $bm->bm = 1;
                $bm->save();
            }
        }

        if (isset($request['km'])){            
            foreach ($request['km'] as $row){
                $km_ex = explode(', ', $row);
                $mstPendidikanKarakterId = $km_ex[0];                
                $km = PendidikanKarakter::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_pendidikan_karakter', $mstPendidikanKarakterId)
                    ->first();
                if (empty($km)){
                    $km = new PendidikanKarakter;
                }
                
                $km->id_siswa = $request['id_siswa'];
                $km->id_master_pendidikan_karakter = $mstPendidikanKarakterId;
                $km->km = 1;
                $km->save();
            }
        }

        if (isset($request['sm'])){            
            foreach ($request['sm'] as $row){
                $sm_ex = explode(', ', $row);
                $mstPendidikanKarakterId = $sm_ex[0];   
                
                $sm = PendidikanKarakter::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_pendidikan_karakter', $mstPendidikanKarakterId)
                    ->first();
                if (empty($sm)){
                    $sm = new PendidikanKarakter;
                }

                $sm->id_siswa = $request['id_siswa'];
                $sm->id_master_pendidikan_karakter = $mstPendidikanKarakterId;
                $sm->sm = 1;
                $sm->save();
            }
        }

        if (isset($request['k'])){            
            foreach ($request['k'] as $row){
                $k_ex = explode(', ', $row);
                $mstPendidikanKarakterId = $k_ex[0];                
                $k = PendidikanKarakter::where('id_siswa', $request['id_siswa'])
                    ->where('id_master_pendidikan_karakter', $mstPendidikanKarakterId)
                    ->first();
                if (empty($k)){
                    $k = new PendidikanKarakter;
                }

                $k->id_siswa = $request['id_siswa'];
                $k->id_master_pendidikan_karakter = $mstPendidikanKarakterId;
                $k->k = 1;
                $k->save();
            }
        }
        return Redirect::back();
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
    //PERTUMBUHAN DAN ABSENSI
    public function indexPertumbuhanAbsensi()
    {
        $getListKelompok = MasterKelompok::get();
        $getListSiswa = MasterSiswa::get();
        $getListEvaluasi = MasterEvaluasiTumbuhKembang::get();
        $getSiswa = null;
        $getPertumbuhanAbsensi = null;
        if (isset($_GET['id_siswa'])){
            $getSiswa = MasterSiswa::find($_GET['id_siswa']);
            $getPertumbuhanAbsensi = PertumbuhanAbsensi::where('id_siswa', $getSiswa->id)->first();            
        }
        
        return view('perkembangan/pertumbuhan-absensi.index',[
            'title' => 'Pertumbuhan & Absensi',
            'listKelompok' => $getListKelompok,
            'listSiswa' => $getListSiswa,
            'getListEvaluasi' => $getListEvaluasi,
            'getSiswa' => $getSiswa,
            'getPertumbuhanAbsensi' => $getPertumbuhanAbsensi
        ]);
    }

    public function storePertumbuhanAbsensi(Request $request, $id = null)
    {
        $request = $request->all();
        
        $data = PertumbuhanAbsensi::where('id_siswa', $request['id_siswa'])->first();
        if (empty($data)){
            $data = new PertumbuhanAbsensi;
        } 
        
        $data->id_siswa = $request['id_siswa'];
        $data->berat_badan = isset($request['berat_badan']) ? $request['berat_badan'] : null;
        $data->tinggi_badan = isset($request['tinggi_badan']) ? $request['tinggi_badan'] : null;
        $data->lingkar_kepala = isset($request['lingkar_kepala']) ? $request['lingkar_kepala'] : null;
        $data->sakit = isset($request['sakit']) ? $request['sakit'] : 0;
        $data->izin = isset($request['izin']) ? $request['izin'] : 0;
        $data->tanpa_keterangan = isset($request['tanpa_keterangan']) ? $request['tanpa_keterangan'] : 0;
        $data->catatan = isset($request['catatan']) ? $request['catatan'] : null;
        $data->save();

        return Redirect::back();
    }
}
