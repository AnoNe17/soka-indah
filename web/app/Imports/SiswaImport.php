<?php

namespace App\Imports;

use App\Models\MasterSiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterSiswa([
            'id_kelompok' => $row[1],
            'nama'=> $row[2],
            'nama_panggilan'=> $row[3],
            'no_induk'=> $row[4],
            'tanggal_lahir'=> $row[5],
            'jenis_kelamin'=> $row[6],
            'agama'=> $row[7],
            'anak_ke'=> $row[8],
            'tanggal_diterima'=> $row[9],
            'status'=> $row[10],
            'nama_wali'=> $row[11],
            'pekerjaan_wali'=> $row[12],
            'no_telp'=> $row[13],
            'alamat'=> $row[14],
            'foto' => $row[15],
        ]);
    }
}
