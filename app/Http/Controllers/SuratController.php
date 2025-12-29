<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function Symfony\Component\Clock\now;

class SuratController extends Controller
{
    public function pilih()
    {
        $jenis = Jenis::all();
        return view('surat.keperluan', compact('jenis'));
    }

    public function form($id)
{
    $jenis = Jenis::where('id', $id)->firstorfail();
    return view('surat.form', compact('jenis'));
}

    public function proses(Request $request)
{
    $jenis = Jenis::findOrFail(request('jenis_id'));

    $lastSurat = Surat::whereYear('tanggal_surat', date('Y'))
    ->where('jenis_id', $jenis->id)
    ->orderBy('no_urut', 'desc')
    ->first();
    dd($lastSurat);
    $nomorUrut = $lastSurat ? $lastSurat->no_urut + 1 : 1;

    $noSurat = $jenis->kode . '/' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y');
    
    $surat = Surat::create([
        'nama' => $request->nama,
        'ttl' => $request->ttl,
        'jk' => $request->jk,
        'agama' => $request->agama,
        'nik' => $request->nik,
        'alamat' => $request->alamat,
        'pekerjaan' => $request->pekerjaan,
        'jenis_id' => $jenis->id,
        'isi_id' => $jenis->isi,
        'no_surat' => $noSurat,
        'no_urut' => $nomorUrut,
        'tanggal_surat' => now(),
    ]);

    return redirect()->route('surat.success', $surat->id);
}

    public function success($id)
{
    $surat = Surat::findOrFail($id);

    return view('surat.succes', compact('surat'));
}

    public function pdf($id)
{
    $surat = Surat::findOrFail($id);

    $data = [
        'judul' => $surat->jenis_id,
        'nomor' => $surat->no_surat,
        'nama' => $surat->nama,
        'ttl' => $surat->ttl,
        'nik' => $surat->nik,
        'jk' => $surat->jk,
        'agama' => $surat->agama,
        'pekerjaan' => $surat->pekerjaan,
        'alamat' => $surat->alamat,
        'isi' => $surat->isi_id,
        'tanggal' => \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y'),
    ];

    $pdf = Pdf::loadView('components.surat', $data)
              ->setPaper('A4', 'portrait');

    return $pdf->stream('surat.pdf');
}

}
