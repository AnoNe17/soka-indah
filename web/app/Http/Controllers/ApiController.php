<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKelompok;
use App\Models\MasterSiswa;
use App\Models\Penilaian;
use App\Models\DetailPenilaian;
use App\Models\Lingkup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $cek = $request->validate(([
            'username' => 'required',
            'password' => 'required',
        ]));
        $user = User::where('username', $request->username)->where('name', 'Siswa')->first();
        $id_siswa = MasterSiswa::where('user_id', $user->id)->first()->id;
        $user->id_siswa = $id_siswa;

        if ($user && Hash::check($request->password, $user->password)) {
            $token = md5(time()) . '.' . md5($request->username);

            return response()->json([
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'message' => 'www'
        ], 400);
    }

    public function profil(Request $request)
    {
        $profil = MasterSiswa::where('user_id', $request->id)->first();
        $kelompok = MasterKelompok::where('id', $profil->id_kelompok)->first();

        $profil->nama_kelompok = $kelompok->nama_kelompok;
        $profil->umur_kelompok = $kelompok->kelompok_umur;

        $hasil['data'] = $profil;
        return $hasil;
    }

    public function semester(Request $request)
    {

        $nilai_semesters = Penilaian::where('id_siswa', $request->id_siswa)->where('semester', $request->semester)->get();

        if (!empty($nilai_semesters[0])) {
            foreach ($nilai_semesters as $jumlah => $nilai_semester) {
                $semester[$jumlah]['minggu_ke'] = $nilai_semester->minggu_ke;
                $semester[$jumlah]['tema'] = $nilai_semester->tema;
                $semester[$jumlah]['sub_tema'] = $nilai_semester->sub_tema;
            }
        } else {

            $semester[0]['minggu_ke'] = 0;
            $semester[0]['tema'] = "-";
            $semester[0]['sub_tema'] = "-";
        }

        return json_encode($semester);
    }

    public function nilaiSmt(Request $request)
    {
        $penilaian = Penilaian::where('id_siswa', $request->id_siswa)->where('semester', $request->semester)->where('minggu_ke', $request->minggu_ke)->get();

        $listLingkup = Lingkup::with('KDIndikator')->get();

        $index = 0;

        foreach ($listLingkup as $jumlah => $lingkup) {
            $detailPenilaian = DetailPenilaian::where('id_lingkup', $lingkup->id)
                ->where('id_penilaian', $penilaian[0]->id)
                ->first();

            if (!empty($detailPenilaian->KDIndikator->nama_kd)) {

                $nilai[$index]['nama_lingkup'] = $lingkup->nama;
                $nilai[$index]['kd_indikator'] = $detailPenilaian->KDIndikator->nama_kd;
                $nilai[$index]['indikator'] = $detailPenilaian->Indikator->nama_indikator;
                if ($detailPenilaian->ceklis == null) {
                    $nilai[$index]['nilai_ceklis'] = "-";
                } else {
                    $nilai[$index]['nilai_ceklis'] = $detailPenilaian->ceklis;
                }
                if ($detailPenilaian->anekdot == null) {
                    $nilai[$index]['nilai_anekdot'] = "-";
                } else {
                    $nilai[$index]['nilai_anekdot'] = $detailPenilaian->anekdot;
                }
                if ($detailPenilaian->hasil_karya == null) {
                    $nilai[$index]['nilai_hasil_karya'] = "-";
                } else {
                    $nilai[$index]['nilai_hasil_karya'] = $detailPenilaian->hasil_karya;
                }
                $index++;
            }
        }


        return json_encode($nilai);
    }

    public function lingkup()
    {
    }

    public function tema(Request $request)
    {
        // return "asd";
        $tema = Penilaian::where('id_siswa', $request->id)->get();
        // $sub_tema_siswa = Penilaian::where('tema', $tema_siswa[0]->tema)->get();

        // $result = array();



        return view('api.tema', [
            'nilais' => $tema
        ]);
        // return $request->id;
        // return MasterSiswa::where('user_id', $request->id)->get();
        // return MasterSiswa::where('user_id', $request->user()->id)->get();


        // return view('api.profil', [
        //     // 'profil' => MasterSiswa::where('user_id', $request->user()->id)->get()
        //     'profil' => $profil
        // ]);
    }

    public function sub_tema(Request $request)
    {
        $tema_siswa = Penilaian::where('id_siswa', $request->id)->get();
        $sub_tema_siswa = Penilaian::where('sub_tema', $request->sub_tema_siswa)->where('id_siswa', $request->id)->get();

        return $sub_tema_siswa;
    }
}
