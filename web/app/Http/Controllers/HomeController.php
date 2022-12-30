<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;
use App\Models\Profile;
use App\Models\MasterPengguna;
use App\Models\MasterSiswa;
use App\Models\MasterKelompok;
use Redirect;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = Profile::first();
        $totalGuru = MasterPengguna::count();
        $totalSiswa = MasterSiswa::count();
        $totalKelompok = MasterKelompok::count();
        
        return view('main.dashboard', [
            'title' => 'Dashboard',
            'profile' => $profile,
            'totalGuru' => $totalGuru,
            'totalSiswa' => $totalSiswa,
            'totalKelompok' => $totalKelompok
        ]);
    }

    public function formTahunAjaran()
    {
        $model = Pengaturan::first();
        
        return view('pengaturan.tahun-ajaran', [
            'title' => 'Pengaturan Tahun Ajaran',            
            'model' => $model
        ]);
    }

    public function storeTahunAjaran(Request $request)
    {
        $request = $request->all();

        $data = Pengaturan::first();
        if (!$data){
            $data = new Pengaturan;
        }

        $data->tahun_ajaran = $request['tahun_ajaran'];
        $data->save();

        return Redirect::to(url('/'));
    }

    public function profile()
    {
        return view('pengaturan.profile', [
            'title' => 'Profile'
        ]);
    }

    public function storeProfile(Request $request)
    {
        $request = $request->all();

        $data = Profile::first();
        if (!$data){
            $data = new Profile;
        }

        $data->nama = $request['nama'];
        $data->program = $request['program'];
        $data->npsn = $request['npsn'];
        $data->alamat = $request['alamat'];
        $data->kelurahan = $request['kelurahan'];
        $data->kecamatan = $request['kecamatan'];
        $data->kabupaten = $request['kabupaten'];
        $data->provinsi = $request['provinsi'];
        $data->save();

        return Redirect::to(url('/'));;
    }
}
