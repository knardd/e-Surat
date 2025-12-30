<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
        }

        .kop {
            width: 100%;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop td {
            vertical-align: middle;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul h3 {
            margin: 0;
            text-decoration: underline;
            font-weight: bold;
        }

        .judul p {
            margin: 5px 0 0 0;
        }

        .isi {
            text-align: justify;
            margin-top: 15px;
            line-height: 1.8;
        }

        .paragraf {
            margin-bottom: 12px;
            text-indent: 30px;
        }

        table.data {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        table.data td {
            padding: 4px 0;
            vertical-align: top;
        }

        .ttd {
            width: 100%;
            margin-top: 40px;
        }

        .ttd td {
            vertical-align: top;
        }
    </style>
</head>
<body>

<!-- KOP SURAT -->
<table class="kop">
    <tr>
        <td width="15%" align="center">
            <img src="{{ public_path('storage/Logo.png') }}" width="80">
        </td>
        <td align="center">
            <strong>
                PEMERINTAH KABUPATEN SUKOHARJO<br>
                KECAMATAN BAKI<br>
                DESA BAKIPANDEYAN
            </strong><br>
            <span style="font-size:11pt;">
                Jl. Kelengkeng No.13 Bakipandeyan, Baki, Sukoharjo Telp (0271) 621362
            </span>
        </td>
    </tr>
</table>

<!-- JUDUL -->
<div class="judul">
    <h3 class="uppercase">{{ $surat->jenis->name }}</h3>
    <p>Nomor: {{ $surat->no_surat }}</p>
</div>

<!-- PEMBUKA -->
@yield('pembuka')

<!-- DATA -->
@yield('data')

<!-- ISI -->
@hasSection('isi')
    <p class="isi">
        @yield('isi')
    </p>
@endif

<!-- PENUTUP -->
@yield('penutup')

<!-- TANDA TANGAN (KANAN BAWAH) -->
<table class="ttd">
    <tr>
        <td width="60%"></td>
        <td align="center">
            Sukoharjo, {{ $surat->tanggal_surat }}<br>
            Kepala Desa Bakipandeyan<br><br><br>
            <img src="{{ public_path('storage/Tanda Tangan.png') }}" width="120"><br>
            <strong>Sugeng Purnomo</strong><br>
            NIP. 1974928364
        </td>
    </tr>
</table>

</body>
</html>
