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

    public function form(Jenis $jenis)
{
    $config = config('surat_fields.' . $jenis->slug);

    if (! $config) {
        abort(404, 'Field not found.');
    }

    $fields = $config['fields'];

    return view('surat.form', compact('jenis', 'fields'));
}

    public function proses(Request $request)
{
    $jenis = Jenis::findOrFail(request('jenis_id'));
    $fields = config('surat_fields.' . $jenis->slug . '.fields');

    $rules = [];
    foreach ($fields as $name => $field) {
        $rules["detail.$name"] = 'required|' . $field['rules'];
    }

    $data = $request->validate($rules);

    $lastSurat = Surat::whereYear('tanggal_surat', date('Y'))
    ->where('jenis_id', $jenis->id)
    ->orderBydesc('no_urut')
    ->first();

    $nomorUrut = $lastSurat ? $lastSurat->no_urut + 1 : 1;
    $noSurat = $jenis->kode . '/' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y');
    
    $surat = Surat::create([
        'jenis_id' => $jenis->id,
        'no_surat' => $noSurat,
        'no_urut' => $nomorUrut,
        'tanggal_surat' => now(),
    ]);

    foreach ($data['detail'] as $key => $value) {
    $surat->details()->create([
        'key' => $key,
        'value' => $value,
    ]);
}

    return redirect()->route('surat.success', $surat->id);
}

    public function success($id)
{
    $surat = Surat::findOrFail($id);

    return view('surat.succes', compact('surat'));
}

    public function pdf($id)
{
    $surat = Surat::with('details', 'jenis')->findOrFail($id);

    $view = in_array($surat->jenis->slug, ['surat-keterangan-kelahiran','surat-keterangan-kematian','surat-keterangan-kepemilikan-rumah'])
        ? 'components.' . $surat->jenis->slug
        : 'components.umum';

    return Pdf::loadView($view, compact('surat'))
        ->setPaper('A4', 'portrait')
        ->stream('surat.pdf');
}

}
