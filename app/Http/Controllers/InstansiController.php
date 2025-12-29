<?php

namespace App\Http\Controllers;

use App\Models\Instansis;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    // LIST DATA
    public function index()
    {
        $instanses = Instansis::all();
        return view('instansi.index', compact('instanses'));
    }

    // FORM CREATE
    public function create()
    {
        return view('instansi.form', [
            'instansi' => null,
            'action' => route('instansi.store'),
            'method' => 'POST'
        ]);
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $this->handleUpload($request, $data);

        Instansis::create($data);

        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(Instansis $instansis)
    {
        return view('instansi.form', [
            'instansi' => $instansis,
            'action' => route('instansi.update', $instansis->id),
            'method' => 'PUT'
        ]);
    }

    // UPDATE DATA
    public function update(Request $request, Instansis $instansis)
    {
        $data = $this->validateData($request);

        $this->handleUpload($request, $data);

        $instansis->update($data);

        return redirect()->route('instansi.index')->with('success', 'Instansi berhasil diperbarui');
    }

    // HAPUS
    public function destroy(Instansis $instansis)
    {
        $instansis->delete();
        return back()->with('success', 'Instansi dihapus');
    }

    /* =====================
        HELPER
    ====================== */

    private function validateData(Request $request)
    {
        return $request->validate([
            'name_instansi'     => 'required',
            'kecamatan'         => 'required',
            'kelurahan'         => 'required',
            'alamat'            => 'required',
            'kabupaten'         => 'required',
            'kepala_nama'       => 'required',
            'kepala_jabatan'    => 'required',
            'kepala_nip'        => 'required',
            'logo'              => 'nullable|image',
            'ttd_image'         => 'nullable|image',
        ]);
    }

    private function handleUpload(Request $request, &$data)
    {
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('instansi', 'public');
        }

        if ($request->hasFile('ttd_image')) {
            $data['ttd_image'] = $request->file('ttd_image')->store('instansi', 'public');
        }
    }
}
