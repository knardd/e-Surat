<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Berhasil Dibuat</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Animasi kecil untuk checkmark */
        @keyframes scaleIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-scale-in {
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
    </style>
</head>
<body class="bg-background min-h-screen flex items-center justify-center p-4 selection:bg-primary selection:text-white">

    <div class="w-full max-w-md">
        <div class="bg-surface rounded-2xl shadow-xl border border-border-soft overflow-hidden relative">
            
            <div class="h-2 w-full bg-primary"></div>

            <div class="p-8 md:p-10 text-center">
                <div class="mb-8 flex justify-center transition-all duration-300">
                    <img src="{{ asset('storage/Logo.png') }}" alt="Logo Instansi" class="h-14 w-auto object-contain">
                </div>

                <div class="mb-6 flex justify-center">
                    <div class="relative flex items-center justify-center w-24 h-24 rounded-full bg-primary/10 animate-scale-in">
                        <div class="absolute inset-0 rounded-full bg-primary/5 animate-ping"></div>
                        
                        <svg class="w-12 h-12 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                </div>

                <h1 class="text-2xl font-bold text-text-main mb-2">
                    Berhasil Dibuat!
                </h1>
                <p class="text-gray-500 text-sm mb-1">
                    Dokumen berikut telah siap untuk dicetak:
                </p>
                <p class="text-lg font-semibold text-primary mb-8">
                    "{{ $surat->jenis->name }}"
                </p>

                <div class="flex flex-col gap-3">
                    <a
                        href="{{ route('surat.pdf', $surat->id) }}"
                        target="_blank"
                        class="group w-full inline-flex items-center justify-center px-6 py-3.5 
                               bg-primary hover:bg-primary-hover text-white font-semibold rounded-xl 
                               shadow-glow transition-all duration-200 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-primary/30"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <path d="M6 14h12v8H6z"/>
                        </svg>
                        Cetak PDF Sekarang
                    </a>

                    <a
                        href="{{ route('surat.pilih') }}"
                        class="w-full inline-flex items-center justify-center px-6 py-3.5 
                               bg-surface text-text-main font-medium rounded-xl border border-border-soft
                               hover:bg-gray-50 hover:text-primary transition-colors duration-200
                               focus:outline-none focus:ring-2 focus:ring-border-soft"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Buat Surat Lain
                    </a>
                </div>
            </div>
        </div>
        
        <p class="text-center text-xs text-gray-400 mt-6">
            &copy; {{ date('Y') }} e-Surat System. All rights reserved.
        </p>
    </div>

</body>
</html>