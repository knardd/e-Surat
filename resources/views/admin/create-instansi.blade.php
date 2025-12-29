@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- PREVIEW --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg mb-4">Preview Kop Surat</h2>

        <div class="text-center">
            <p class="font-bold text-xl">
                {{ $instansi->name_instansi ?? 'Nama Instansi' }}
            </p>
            <p>Kecamatan {{ $instansi->kecamatan ?? '...' }}</p>
            <p>Kelurahan {{ $instansi->kelurahan ?? '...' }}</p>
            <p class="text-sm mt-2">{{ $instansi->alamat ?? 'Alamat' }}</p>
        </div>

        <div class="mt-16 text-right">
            <p>{{ $instansi->kabupaten ?? 'Kabupaten' }}</p>
            <p class="mt-12 font-semibold">
                {{ $instansi->kepala_nama ?? 'Nama Kepala' }}
            </p>
            <p class="text-sm">{{ $instansi->kepala_jabatan ?? 'Jabatan' }}</p>
            <p class="text-sm">NIP {{ $instansi->kepala_nip ?? '-' }}</p>
        </div>
    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg mb-4">
            {{ $instansi ? 'Edit Instansi' : 'Tambah Instansi' }}
        </h2>

        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if($method === 'PUT') @method('PUT') @endif

            <input class="input" name="name_instansi" placeholder="Nama Instansi"
                value="{{ old('name_instansi', $instansi->name_instansi ?? '') }}">

            <input class="input" name="kecamatan" placeholder="Kecamatan"
                value="{{ old('kecamatan', $instansi->kecamatan ?? '') }}">

            <input class="input" name="kelurahan" placeholder="Kelurahan"
                value="{{ old('kelurahan', $instansi->kelurahan ?? '') }}">

            <textarea class="input" name="alamat" placeholder="Alamat">{{ old('alamat', $instansi->alamat ?? '') }}</textarea>

            <input class="input" name="kabupaten" placeholder="Kabupaten"
                value="{{ old('kabupaten', $instansi->kabupaten ?? '') }}">

            <hr>

            <input class="input" name="kepala_nama" placeholder="Nama Kepala"
                value="{{ old('kepala_nama', $instansi->kepala_nama ?? '') }}">

            <input class="input" name="kepala_jabatan" placeholder="Jabatan Kepala"
                value="{{ old('kepala_jabatan', $instansi->kepala_jabatan ?? '') }}">

            <input class="input" name="kepala_nip" placeholder="NIP"
                value="{{ old('kepala_nip', $instansi->kepala_nip ?? '') }}">

            <div>
                <label class="text-sm">Logo</label>
                <input type="file" name="logo">
            </div>

            <div>
                <label class="text-sm">Tanda Tangan</label>
                <input type="file" name="ttd_image">
            </div>

            <button class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                Simpan
            </button>
        </form>
    </div>

</div>
@endsection
