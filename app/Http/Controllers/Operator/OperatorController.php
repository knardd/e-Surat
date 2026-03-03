<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OperatorController extends Controller
{
    /**
     * Display list of pending surat waiting for operator approval
     */
    public function index()
    {
        $surats = Surat::where('status', 'diproses')
            ->with(['user', 'jenis'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Operator/Dashboard', [
            'surats' => $surats,
        ]);
    }

    /**
     * Show detail of specific surat
     */
    public function show($id)
    {
        $surat = Surat::with(['user', 'jenis', 'details', 'logs.user'])->findOrFail($id);

        // Ensure it's still pending operator review
        if ($surat->status !== 'diproses') {
            return redirect()->route('operator.dashboard')
                ->with('error', 'Surat ini sudah diproses sebelumnya');
        }

        return Inertia::render('Operator/ShowSurat', [
            'surat' => $surat,
            'detailMap' => $surat->detail_map,
        ]);
    }

    /**
     * Approve surat (operator approval)
     */
    public function approve(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'nullable|string|max:1000',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->status !== 'diproses') {
            return redirect()->back()
                ->with('error', 'Surat ini tidak bisa diapprove lagi');
        }

        // Update surat status
        $surat->update([
            'status' => 'disetujui',
            'internal_status' => 'waiting_admin',
            'current_handler' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        // Log the action
        $surat->logs()->create([
            'status' => 'disetujui',
            'changed_by' => auth()->id(),
            'catatan' => $request->input('catatan') ?? 'Disetujui oleh operator',
        ]);

        return redirect()->route('operator.dashboard')
            ->with('success', 'Surat telah diapprove');
    }

    /**
     * Reject surat (operator rejection)
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required|string|max:1000',
        ]);

        $surat = Surat::findOrFail($id);

        if ($surat->status !== 'diproses') {
            return redirect()->back()
                ->with('error', 'Surat ini tidak bisa ditolak lagi');
        }

        // Update surat status
        $surat->update([
            'status' => 'ditolak',
            'internal_status' => 'operator_rejected',
            'current_handler' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        // Log the action
        $surat->logs()->create([
            'status' => 'ditolak',
            'changed_by' => auth()->id(),
            'catatan' => $request->input('catatan'),
        ]);

        return redirect()->route('operator.dashboard')
            ->with('success', 'Surat telah ditolak');
    }

    public function createUser() {
        return Inertia::render('Operator/CreateSurat');
    }
}
