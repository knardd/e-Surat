<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Berhasil Dibuat</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl ring-1 ring-gray-200 w-full max-w-md overflow-hidden">
            <!-- Header with logo -->
            <div class="pt-6 pb-4 flex justify-center">
                <img src="{{ asset('storage/Logo.png') }}" alt="Logo" class="h-auto w-20 object-contain">
            </div>

            <!-- Success Icon -->
            <div class="relative py-6 flex justify-center">
                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-md">
                    <div class="rounded-full bg-white w-24 h-24 flex items-center justify-center">
                        <svg class="w-14 h-14" fill="none" viewBox="0 0 24 24">
                            <defs>
                                <linearGradient id="blueGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#3b82f6" />
                                    <stop offset="100%" stop-color="#2563eb" />
                                </linearGradient>
                            </defs>
                            <path
                                stroke="url(#blueGradient)"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 pb-6 text-center">
                <h1 class="text-lg font-semibold text-gray-800 mb-5 leading-relaxed">
                    {{ $surat->jenis->name }} Berhasil Dibuat
                </h1>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a
                        href="{{ route('surat.pilih') }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 rounded-lg shadow-sm transition duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Kembali
                    </a>
                    <a
                        href="{{ route('surat.pdf', $surat->id) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 rounded-lg shadow-sm transition duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1.5">
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"/>
                            <rect x="6" y="14" width="12" height="8" rx="1"/>
                        </svg>
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>