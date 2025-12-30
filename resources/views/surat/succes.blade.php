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
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md overflow-hidden">
            <!-- Header with logo -->
            <div class="py-6 flex justify-center">
                <img src="{{ asset('storage/Logo.png') }}" alt="Logo" class="h-auto w-24 object-contain">
            </div>

                <div class="relative mt-8 mb-6 flex justify-center">
      <div class="w-36 h-36 rounded-full bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center shadow-lg animate-scaleIn">
        <div class="rounded-full bg-white w-28 h-28 flex items-center justify-center">
          <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24">
            <defs>
              <linearGradient id="tealToEmerald" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#2dd4bf" />
                <stop offset="100%" stop-color="#34d399" />
              </linearGradient>
            </defs>
            <path
              class="checkmark-path"
              stroke="url(#tealToEmerald)"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="3"
              d="M5 13l4 4L19 7"
            />
          </svg>
        </div>
      </div>
    </div>


            <!-- Content -->
            <div class="p-6 text-center">
                <h1 class="text-lg font-semibold text-gray-800 mb-5">
                    {{ $surat->jenis->name }} Berhasil Dibuat
                </h1>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a
                        href="{{ route('surat.pilih') }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Kembali
                    </a>
                    <a
                        href="{{ route('surat.pdf', $surat->id) }}"
                        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
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