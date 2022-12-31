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
use Redirect;
use Hash;
use Carbon\Carbon;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MasterController extends Controller
{
    // MASTER SISWA
    // ---------------------------------------------------------------------------------------------
    public function listDataSiswa()
    {
        $data = MasterSiswa::get();
        return view('master.data-siswa.index', [
            'module' => 'Master',
            'title' => 'Data Siswa',
            'data' => $data
        ]);
    }

    public function siswaExport()
    {
        return Excel::download(new SiswaExport, 'siswapaud.xlsx');
    }
    public function siswaImport(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSiswa', $namaFile);

        Excel::import(new SiswaImport, public_path('/DataSiswa/' . $namaFile));
        return redirect('/master/data-siswa/');
    }
    public function createDataSiswa()
    {
        return view('master.data-siswa.form', [
            'kelompoks' => MasterKelompok::all(),
            'jumlah_siswa' => MasterSiswa::all()->count(),
            'module' => 'Master',
            'title' => 'Data Siswa'
        ]);
    }

    public function editDataSiswa($id)
    {
        $model = MasterSiswa::find($id);
        return view('master.data-siswa.form', [
            'kelompoks' => MasterKelompok::all(),
            'jumlah_siswa' => MasterSiswa::all()->count(),
            'module' => 'Master',
            'title' => 'Data Siswa',
            'model' => $model
        ]);
    }

    public function storeDataSiswa(Request $request, $id = null)
    {
        // return $id;
        $data = new MasterSiswa;
        if ($id) {
            $data = MasterSiswa::find($id);
        }
        $data->nama = $request->input('nama_siswa');
        $data->nama_panggilan = $request->input('nama_panggilan');
        $data->no_induk = $request->input('no_induk');
        $data->tanggal_lahir = date('Y-m-d', strtotime($request->input('tanggal_lahir')));
        $data->jenis_kelamin = $request->input('jenis_kelamin');
        $data->agama = $request->input('agama');
        $data->anak_ke = $request->input('anak_ke');
        $data->id_kelompok = $request->input('kelompok_umur');
        $data->tanggal_diterima = date('Y-m-d', strtotime($request->input('tanggal_diterima')));
        $data->status = $request->input('status');
        $data->nama_wali = $request->input('nama_wali');
        $data->pekerjaan_wali = $request->input('pekerjaan_wali');
        $data->no_telp = $request->input('no_telp');
        $data->alamat = $request->input('alamat');
        $data->foto = $request->input('foto');

        $userSiswa = new User;

        if (!empty($id)) {
            $userSiswa = User::find($data->user_id);
        }

        $userSiswa->name = 'Siswa';
        $userSiswa->username = $request->input('no_induk');
        $userSiswa->email = 'siswa' . $request->input('no_induk') . '@paudsokaindah.com';

        $pass = 'sokaindah' . $request->input('no_induk');

        $userSiswa->password = bcrypt($pass);
        if ($userSiswa->save()) {
            $data->user_id = $userSiswa->id;
            $data->save();
        }
        return Redirect::to(url('master/data-siswa'));
    }

    public function deleteDataSiswa($id)
    {
        $data = MasterSiswa::find($id);
        $data->delete();

        return Redirect::to(url('master/data-siswa'));
    }

    public function createPasswordDataSiswa($id)
    {
        $user = MasterSiswa::find($id);

        return view('auth.register_siswa', [
            'user' => $user,
        ]);
    }

    public function storePasswordDataSiswa(Request $request)
    {
        $pass = Hash::make($request->password);
        $data = User::where('id', $request->id)->first();
        $data->password = $pass;

        if ($data->save()) {
            return Redirect::to(url('master/data-siswa'));
        } else {
            return back();
        }
    }





    // MASTER GURU
    // -----------------------------------------------------------------------------------------

    public function listDataPengguna()
    {
        $data = MasterPengguna::get();

        return view('master.data-pengguna.index', [
            'module' => 'Master',
            'title' => 'Data Pengguna',
            'data' => $data
        ]);
    }

    public function createDataPengguna()
    {
        return view('master.data-pengguna.form', [
            'module' => 'Master',
            'title' => 'Data Pengguna'
        ]);
    }

    public function editDataPengguna($id)
    {
        $model = MasterPengguna::find($id);
        return view('master.data-pengguna.form', [
            'module' => 'Master',
            'title' => 'Data Pengguna',
            'model' => $model
        ]);
    }

    public function createPasswordDataPengguna($id)
    {
        $user = MasterPengguna::find($id);

        return view('auth.register', [
            'user' => $user
        ]);
    }

    public function storePasswordDataPengguna(Request $request)
    {

        $request = $request->all();
        $dataPengguna = MasterPengguna::find($request['id_pengguna']);

        if (isset($request['update'])) {
            $data = User::find($request['id_user']);
        } else {
            $data = new User;
        }

        $data->name = $request['name'];
        if (isset($request['username'])) $data->username = $request['username'];
        if (isset($request['email'])) $data->email = $request['email'];

        $data->password = Hash::make($request['password']);
        $data->timestamps = false;
        if ($data->save()) {
            $dataPengguna->id_user = $data->id;
            $dataPengguna->timestamps = false;
            $dataPengguna->save();
        }

        return Redirect::to(url('master/data-pengguna'));
    }

    public function storeDataPengguna(Request $request, $id = null)
    {
        $data = new MasterPengguna;
        if ($id) {
            $data = MasterPengguna::find($id);
        }
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        $data->telp = $request->input('telp');
        $data->alamat = $request->input('alamat');
        $data->status = $request->input('status');
        $data->save();

        return Redirect::to(url('master/data-pengguna'));
    }

    public function deleteDataPengguna($id)
    {
        $data = MasterPengguna::find($id);
        $data->delete();

        return Redirect::to(url('master/data-pengguna'));
    }

    // MASTER KELOMPOK
    // -----------------------------------------------------------------------------------------

    public function listDataKelompok()
    {
        $data = MasterKelompok::get();
        return view('master.data-kelompok.index', [
            'module' => 'Master',
            'title' => 'Data Kelompok',
            'data' => $data
        ]);
    }

    public function createDataKelompok()
    {
        return view('master.data-kelompok.form', [
            'module' => 'Master',
            'title' => 'Data Kelompok'
        ]);
    }

    public function editDataKelompok($id)
    {
        $model = MasterKelompok::find($id);
        return view('master.data-kelompok.form', [
            'module' => 'Master',
            'title' => 'Data Kelompok',
            'model' => $model
        ]);
    }

    public function pilihSiswa($id)
    {
        $model = MasterKelompok::find($id);
        $siswa = MasterSiswa::get();
        // CHECK SISWA YANG SUDAH MASUK KE DALAM KELOMPOK
        $listSiswa = [];
        foreach ($siswa as $row) {
            $siswaDalamKelompok = MasterKelompokDetail::where('id_siswa', $row->id)
                ->first();

            if ($siswaDalamKelompok) {
                continue;
            } else {
                $listSiswa[] = $row;
            }
        }

        $siswaKelompok = MasterKelompokDetail::where('id_kelompok', $id)->get();
        return view('master.data-kelompok.form_pilih_siswa', [
            'module' => 'Master',
            'title' => 'Data Kelompok',
            'model' => $model,
            'listSiswa' => $listSiswa,
            'siswaKelompok' => $siswaKelompok
        ]);
    }
    public function lihatSiswa($id)
    {
        $model = MasterKelompok::find($id);
        $siswa = MasterSiswa::get();
        // LIHAT SISWA COBAAAA
        $listSiswa = [];
        foreach ($siswa as $row) {
            $siswaDalamKelompok = MasterKelompokDetail::where('id_siswa', $row->id)
                ->first();

            if ($siswaDalamKelompok) {
                continue;
            } else {
                $listSiswa[] = $row;
            }
        }

        $siswaKelompok = MasterKelompokDetail::where('id_kelompok', $id)->get();
        return view('master.data-kelompok.lihat_siswa', [
            'module' => 'Master',
            'title' => 'Data Kelompok',
            'model' => $model,
            'listSiswa' => $listSiswa,
            'siswaKelompok' => $siswaKelompok
        ]);
    }

    public function storeDataKelompok(Request $request, $id = null)
    {
        $data = new MasterKelompok;
        if ($id) {
            $data = MasterKelompok::find($id);
        }
        $data->nama_kelompok = $request->input('nama_kelompok');
        $data->kelompok_umur = $request->input('kelompok_umur');
        $data->wali_kelas = $request->input('wali_kelas');
        $data->save();

        return Redirect::to(url('master/data-kelompok'));
    }

    public function storePilihSiswa(Request $request, $id = null)
    {
        $request = $request->all();
        if (isset($request['id_siswa'])) {
            foreach ($request['id_siswa'] as $key => $row) {
                $data = new MasterKelompokDetail;
                $data->id_kelompok = $id;
                $data->id_siswa = $row;
                $data->timestamps = false;
                $data->save();
            }
        } else {
            return Redirect::to(url('master/data-kelompok'));
        }

        return Redirect::to(url('master/data-kelompok/pilih-siswa/' . $id));
    }
    /// COBAAA
    public function storeLihatSiswa(Request $request, $id = null)
    {
        $request = $request->all();
        if (isset($request['id_siswa'])) {
            foreach ($request['id_siswa'] as $key => $row) {
                $data = new MasterKelompokDetail;
                $data->id_kelompok = $id;
                $data->id_siswa = $row;
                $data->timestamps = false;
                $data->save();
            }
        } else {
            return Redirect::to(url('master/data-kelompok'));
        }

        return Redirect::to(url('master/data-kelompok/lihat-siswa/' . $id));
    }

    public function deleteDataKelompok($id)
    {
        $data = MasterKelompok::find($id);
        $data->delete();

        return Redirect::to(url('master/data-kelompok'));
    }

    // MASTER KD INDIKATOR
    // -----------------------------------------------------------------------------------------

    public function listDataKdIndikator()
    {
        $data = KDIndikator::get();
        $listLingkup = Lingkup::with('KDIndikator')
            ->get();

        return view('master.data-kd.index', [
            'module' => 'Master',
            'title' => 'Data KD Indikator',
            'data' => $data,
            'listLingkup' => $listLingkup
        ]);
    }

    public function createDataKdIndikator()
    {
        $listLingkup = Lingkup::get();
        $listKelompok = MasterKelompok::get();

        return view('master.data-kd.form', [
            'module' => 'Master',
            'title' => 'Data KD Indikator',
            'listLingkup' => $listLingkup,
            'listKelompok' => $listKelompok,

        ]);
    }

    public function createIndikator($id)
    {
        $data = KDIndikator::find($id);

        return view('master.data-kd.form_indikator', [
            'module' => 'Master',
            'title' => 'Data KD Indikator',
            'data' => $data,

        ]);
    }

    public function editDataKdIndikator($id)
    {
        $model = KDIndikator::find($id);
        return view('master.data-kd.form', [
            'module' => 'Master',
            'title' => 'Data KD Indikator',
            'model' => $model
        ]);
    }

    public function storeDataKdIndikator(Request $request, $id = null)
    {
        $data = new KDIndikator;
        if ($id) {
            $data = KDIndikator::find($id);
        }

        $data->id_kelompok = $request->input('id_kelompok');
        $data->id_lingkup = $request->input('id_lingkup');
        $data->kode = $request->input('kode');
        $data->nama_kd = $request->input('nama_kd');
        $data->save();

        return Redirect::to(url('master/data-kd'));
    }

    public function storeIndikator(Request $request, $id = null)
    {
        $request = $request->all();
        $indikator = explode(', ', $request['indikator']);

        if ($request['indikator']) {
            foreach ($indikator as $row) {
                $data = new Indikator;
                $data->id_kd_indikator = $request['id_kd_indikator'];
                $data->nama_indikator = $row;
                $data->timestamps = false;
                $data->save();
            }
        }

        return Redirect::to(url('master/data-kd'));
    }
}
