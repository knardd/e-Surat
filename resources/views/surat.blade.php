@include('components.kop')

<h1 style="text-align:center; text-decoration:underline;">
    {{ $judul }}
</h1>
<p>Nomor: {{ $nomor }}</p>

<p>
    Yang bertanda tangan di bawah ini, Lurah XXXXX Kecamatan XXXXX Kota Surakarta,
    menerangkan bahwa:
</p>

<table>
    <tr><td width="30%">Nama</td><td>: {{ $nama }}</td></tr>
    <tr><td>NIK</td><td>: {{ $nik }}</td></tr>
    <tr><td>Tempat/Tgl Lahir</td><td>: {{ $ttl }}</td></tr>
    <tr><td>Alamat</td><td>: {{ $alamat }}</td></tr>
    <tr><td>Pekerjaan</td><td>: {{ $pekerjaan }}</td></tr>
</table>

<p>
    {{ $isi }}
</p>

<div class="ttd">
    Surakarta, {{ $tanggal }}<br>
    {{ $penandatangan }}<br><br>
    <img src="{{ asset('storage/Tanda Tangan.png') }}" width="120"><br>
    <strong>Nama Lurah</strong><br>
    NIP. 19xxxxxxxxx
</div>
