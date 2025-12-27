<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Keperluan($jenis)
    {
        $jenis = '';
        $isi = '';

        switch ($jenis) {
            case 'domisili':
                $judul = 'SURAT KETERANGAN DOMISILI';
                $isi = 'Adalah benar berdomisili di wilayah kelurahan kami.';
                break;

            case 'sktm':
                $judul = 'SURAT KETERANGAN TIDAK MAMPU (SKTM)';
                $isi = 'Adalah benar tergolong keluarga tidak mampu.';
                break;

            case 'usaha':
                $judul = 'SURAT KETERANGAN USAHA (SKU)';
                $isi = 'Adalah benar memiliki usaha tersebut di wilayah Kelurahan XXXXX Kecamatan XXXXX Kota Surakarta.';
                break;
        }
    }

    public function generateSurat(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'keperluan' => 'nullable',
            'tanggal' => 'required|date',
            'penandatangan' => 'required',
        ]);

        // Simpan ke DB (opsional, untuk statistik)
        // Surat::create($data);

        // Generate PDF
        // $pdf = Pdf::loadView('surat.surat', $data)
        //           ->setPaper('A4', 'portrait');

        // return $pdf->stream('surat.pdf');
    }
}
