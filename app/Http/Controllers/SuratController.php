<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Inertia\Inertia;

use function Symfony\Component\Clock\now;

class SuratController extends Controller
{
    public function dashboard()
    {
        return view('surat.dashboard');
    }

    public function pilih()
    {
        $jenis = Jenis::all();
        return Inertia::render('Beranda', [
            'jenis' => $jenis,
        ]);
    }

    public function form(Jenis $jenis)
{
    $config = config('surat_fields.' . $jenis->slug);

    if (! $config) {
        abort(404, 'Field not found.');
    }

    $fields = $config['fields'];

    return Inertia::render('FormSurat', [
        'jenis' => $jenis, 
        'fields' => $fields]);
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
        'user_id' => auth()->id(),
        'jenis_id' => $jenis->id,
        'status' => 'diproses',
        'internal_status' => 'submitted',
        'no_surat' => $noSurat,
        'no_urut' => $nomorUrut,
        'tanggal_surat' => Carbon::now(),
    ]);

    // Log creation
    $surat->logs()->create([
        'status' => 'diproses',
        'changed_by' => auth()->id(),
        'catatan' => 'Permintaan surat dibuat',
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
    $surat = Surat::with('jenis')->findOrFail($id);

    return Inertia::render("Succes", [
        'surat' => $surat
    ]); 
}

    public function pdf($id)
{
    $surat = Surat::with('details', 'jenis')->findOrFail($id);

    $view = in_array($surat->jenis->slug, [
        'surat-keterangan-kelahiran',
        'surat-keterangan-kematian',
        'surat-keterangan-kepemilikan-rumah',
        'surat-keterangan-usaha',
        'surat-keterangan-keluarga',
        ])
        ? 'components.' . $surat->jenis->slug
        : 'components.umum';

    return Pdf::loadView($view, compact('surat'))
        ->setPaper('A4', 'portrait')
        ->stream('surat.pdf');
}

    /**
     * User dashboard - show all surat they requested
     */
    public function userDashboard()
    {
        $surats = Surat::where('user_id', auth()->id())
            ->with(['jenis', 'logs'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('User/Dashboard', [
            'surats' => $surats,
        ]);
    }

    /**
     * Download surat PDF (only if approved by admin)
     */
    public function download($id)
    {
        $surat = Surat::with('details', 'jenis')->findOrFail($id);

        // Check ownership
        if ($surat->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Check if approved
        if ($surat->internal_status !== 'final_approved') {
            abort(403, 'Surat belum disetujui admin');
        }

        $view = in_array($surat->jenis->slug, [
            'surat-keterangan-kelahiran',
            'surat-keterangan-kematian',
            'surat-keterangan-kepemilikan-rumah',
            'surat-keterangan-usaha',
            'surat-keterangan-keluarga',
        ])
            ? 'components.' . $surat->jenis->slug
            : 'components.umum';

        return Pdf::loadView($view, compact('surat'))
            ->setPaper('A4', 'portrait')
            ->download('surat-' . $surat->no_surat . '.pdf');
    }

}
