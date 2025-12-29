<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="fixed inset-0 bg-blue-100 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl w-[90%] max-w-md p-6 text-center">
            <img src="{{ asset('storage/Logo.png') }}" alt="" class="w-1/2 h-auto" >
            <h1 class="text-gray-800">{{ $surat->jenis_id }} Berhasil dibuat</h1>
            <div class="flex justify-center gap-2">
                <button 
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                    <a href="{{ route('surat.pilih') }}">Kembali</a></button>
                <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-8 rounded-lg flex items-center"
                >
                <a href="{{ route('surat.pdf', $surat->id) }}" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-printer-icon lucide-printer"><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"/><rect x="6" y="14" width="12" height="8" rx="1"/></svg>
                    <span class="ml-1">Print</span></a></button>
            </div>
        </div>
    </div>
</body>
</html>