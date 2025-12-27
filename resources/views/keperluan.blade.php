<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <button>
            <a href="{{ route('form' , ['jenis' => 'omisili']) }}" >Surat Domisili</a>
        </button>
    </div>
    <div>
        <button>
            <a href="{{ route('form' , ['jenis' => 'sktm']) }}">Surat Keterangan Tidak Mampu (SKTM)</a>
        </button>
    </div>
    <div>
        <button>
            <a href="{{ route('form' , ['jenis' => 'usaha']) }}">Surat Keterangan Usaha (SKU)</a>
        </button>
    </div>
</body>
</html>