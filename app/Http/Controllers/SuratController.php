<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $isRequired = (isset($field['required']) && $field['required']) ? 'required|' : 'nullable|';
        $rules["detail.$name"] = $isRequired . $field['rules'];
    }

    $data = $request->validate($rules);

    $lastSurat = Surat::whereYear('tanggal_surat', date('Y'))
    ->where('jenis_id', $jenis->id)
    ->orderBydesc('no_urut')
    ->first();

    $nomorUrut = $lastSurat ? $lastSurat->no_urut + 1 : 1;
    $noSurat = $jenis->kode . '/' . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y');
    
    $surat = Surat::create([
        'user_id' => Auth::id(),
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
        'changed_by' => Auth::id(),
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

    // Security check: only owner can see success page
    if ($surat->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    return Inertia::render("Succes", [
        'surat' => $surat
    ]); 
}

    public function pdf($id)
{
    $surat = Surat::with('details', 'jenis')->findOrFail($id);
    
    // Security check: only owner, operator, or admin can view PDF
    if ($surat->user_id !== Auth::id() && !in_array(Auth::user()->role, ['admin', 'operator'])) {
        abort(403, 'Unauthorized');
    }

    $view = $this->getPdfView($surat);

    return Pdf::loadView($view, compact('surat'))
        ->setPaper('A4', 'portrait')
        ->stream('surat.pdf');
}

    /**
     * User dashboard - show all surat they requested
     */
    public function userDashboard()
    {
        $surats = Surat::where('user_id', Auth::id())
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
        if ($surat->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Check if approved
        if ($surat->internal_status !== 'final_approved') {
            abort(403, 'Surat belum disetujui admin');
        }

        $view = $this->getPdfView($surat);

        return Pdf::loadView($view, compact('surat'))
            ->setPaper('A4', 'portrait')
            ->download('surat-' . $surat->no_surat . '.pdf');
    }

    /**
     * Get PDF view template name
     */
    private function getPdfView(Surat $surat)
    {
        $specificTemplates = [
            'surat-keterangan-kelahiran',
            'surat-keterangan-kematian',
            'surat-keterangan-kepemilikan-rumah',
            'surat-keterangan-usaha',
            'surat-keterangan-keluarga',
        ];

        return in_array($surat->jenis->slug, $specificTemplates)
            ? 'components.' . $surat->jenis->slug
            : 'components.umum';
    }

}
