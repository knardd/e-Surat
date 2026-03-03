<?php

namespace App\Http\Controllers\Admin;

use App\Models\Surat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminController extends Controller
{
    /**
     * Display dashboard with statistics
     */
    public function index()
    {
        $surat = Surat::all();
        $totalSuratTahunIni = Surat::whereYear('tanggal_surat', now()->year)->count();
        $totalSuratBulanIni = Surat::whereMonth('tanggal_surat', now()->month)->count();
        $totalSuratHariIni = $surat->where('tanggal_surat', now()->toDateString())->count();

        $rawData = Surat::selectRaw('MONTH(tanggal_surat) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_surat', now()->year)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $chartData = [];

        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = [
                'bulan' => $i,
                'total' => $rawData[$i] ?? 0
            ];
        }

        $suratPerJenis = Surat::join('jenis', 'surats.jenis_id', '=', 'jenis.id')
            ->select('jenis.name as jenis', DB::raw('COUNT(surats.id) as total'))
            ->groupBy('jenis.name')
            ->orderByDesc('total')
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'totalSuratTahunIni' => $totalSuratTahunIni,
            'totalSuratBulanIni' => $totalSuratBulanIni,
            'totalSuratHariIni' => $totalSuratHariIni,
            'chartData' => $chartData,
            'suratPerJenis' => $suratPerJenis
        ]);
    }

    /**
     * Display list of surat waiting for admin approval (approved by operator)
     */
    public function cekSurat()
    {
        $surats = Surat::where('status', 'disetujui')
            ->where('internal_status', 'waiting_admin')
            ->with(['user', 'jenis', 'currentHandlerUser'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Admin/CekSurat', [
            'surats' => $surats,
        ]);
    }

    /**
     * Show detail of specific surat
     */
    public function show($id)
    {
        $surat = Surat::with(['user', 'jenis', 'details', 'logs.user', 'currentHandlerUser'])->findOrFail($id);

        // Ensure it's waiting for admin approval
        if ($surat->status !== 'disetujui' || $surat->internal_status !== 'waiting_admin') {
            return redirect()->route('admin.cekSurat')
                ->with('error', 'Surat ini tidak perlu admin review lagi');
        }

        return Inertia::render('Admin/ShowSurat', [
            'surat' => $surat,
            'detailMap' => $surat->detail_map,
        ]);
    }

    /**
     * Approve surat (admin final approval)
     */
    public function approve(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'nullable|string|max:1000',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->status !== 'disetujui' || $surat->internal_status !== 'waiting_admin') {
            return redirect()->back()
                ->with('error', 'Surat ini tidak bisa diapprove lagi');
        }

        // Update surat status - FINAL APPROVAL
        $surat->update([
            'status' => 'disetujui', // Keep status for consistency
            'internal_status' => 'final_approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'current_handler' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        // Log the action
        $surat->logs()->create([
            'status' => 'admin_approved',
            'changed_by' => auth()->id(),
            'catatan' => $request->input('catatan') ?? 'Disetujui oleh admin - FINAL',
        ]);

        return redirect()->route('admin.cekSurat')
            ->with('success', 'Surat telah diapprove dan siap dikirim');
    }

    /**
     * Reject surat (admin rejection)
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required|string|max:1000',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->status !== 'disetujui' || $surat->internal_status !== 'waiting_admin') {
            return redirect()->back()
                ->with('error', 'Surat ini tidak bisa ditolak lagi');
        }

        // Update surat status
        $surat->update([
            'status' => 'ditolak',
            'internal_status' => 'admin_rejected',
            'current_handler' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        // Log the action
        $surat->logs()->create([
            'status' => 'admin_rejected',
            'changed_by' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        return redirect()->route('admin.cekSurat')
            ->with('success', 'Surat telah ditolak');
    }
}
