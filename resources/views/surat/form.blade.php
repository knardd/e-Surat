<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        input:focus {
            outline: none;
            border-color: #4f46e5;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #4f46e5;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #4338ca;
        }
        .note {
            font-size: 13px;
            color: #555;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>FORM {{ strtoupper($jenis->name) }}</h2>

    <form action="{{ route('surat.proses') }}" method="POST">
        @csrf
        <input type="hidden" name="jenis_id" value="{{ $jenis->id }}">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" required>
        </div>

        <div class="form-group">
            <label>Tempat / Tanggal Lahir</label>
            <input type="text" name="ttl" placeholder="Contoh: Sukoharjo, 12 Januari 2005" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Agama</label>
            <select name="agama" required>
                <option value="">-- Pilih --</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" required>
        </div>

        <div class="form-group">
            <label>Alamat Lengkap</label>
            <input type="text" name="alamat" required>
        </div>

        <button type="submit">Buat Surat</button>
    </form>

    <div class="note">
        Pastikan data diisi dengan benar sesuai KK/KTP
    </div>
</div>

</body>
</html>
