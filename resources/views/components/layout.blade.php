<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'E-Surat Digital' }} - Pemerintah Kabupaten Sukoharjo</title>
    <meta name="description" content="Sistem pembuatan surat digital Pemerintah Kabupaten Sukoharjo">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen page-gradient text-text-main font-sans">
    
    <!-- Header -->
    <header class="header-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo & Title -->
                <a href="{{ route('surat.pilih') }}" class="flex items-center gap-3 group">
                    <div class="relative">
                        <img 
                            src="{{ asset('storage/Logo.png') }}" 
                            alt="Logo Pemerintah" 
                            class="h-10 md:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                        >
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-sm md:text-base font-bold text-primary leading-tight">
                            PEMERINTAH KABUPATEN SUKOHARJO
                        </h1>
                        <p class="text-xs text-text-muted font-medium">
                            Sistem E-Surat Digital
                        </p>
                    </div>
                </a>

                <!-- Right Side - Optional Nav -->
                <div class="flex items-center gap-4">
                    <div class="hidden md:flex items-center gap-2 text-sm text-text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <span>Sistem Terverifikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-border-soft bg-white/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img 
                        src="{{ asset('storage/Logo.png') }}" 
                        alt="Logo" 
                        class="h-8 w-auto"
                    >
                    <div class="text-sm">
                        <p class="font-semibold text-text-main">Desa Bakipandeyan</p>
                        <p class="text-text-muted text-xs">Kecamatan Baki, Kabupaten Sukoharjo</p>
                    </div>
                </div>
                
                <div class="text-center md:text-right text-xs text-text-muted">
                    <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Sukoharjo. All rights reserved.</p>
                    <p class="mt-1">
                        <span class="inline-flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Jl. Kelengkeng No.13 Bakipandeyan, Baki, Sukoharjo
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
