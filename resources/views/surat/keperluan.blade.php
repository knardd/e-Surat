<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Jenis Surat</title>
    @vite('resources/css/app.css')
    <style>
        /* Opsional: pastikan font Inter/Poppins dimuat via Vite atau CDN */
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen py-8 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Pilih Jenis Surat</h1>

        <!-- Search Input -->
        <div class="mb-8">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari jenis surat..."
                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
            />
        </div>

        <!-- Surat List -->
        <div id="suratList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($jenis as $item)
                <a
                    href="{{ route('surat.form', $item->slug) }}"
                    class="surat-item block bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-200 hover:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    data-name="{{ strtolower($item->name) }}"
                >
                    <h2 class="text-lg font-semibold text-gray-800 line-clamp-2">
                        {{ $item->name }}
                    </h2>
                </a>
            @endforeach
        </div>

        <!-- Empty State -->
        <p id="emptyText" class="hidden text-center text-gray-500 mt-8 text-sm">
            Tidak ada jenis surat ditemukan
        </p>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const suratItems = document.querySelectorAll('.surat-item');
        const emptyText = document.getElementById('emptyText');
        const suratList = document.getElementById('suratList');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            suratItems.forEach(item => {
                const name = item.dataset.name;
                if (name.includes(keyword)) {
                    item.classList.remove('hidden');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Tampilkan/sembunyikan pesan kosong
            if (visibleCount === 0 && keyword !== '') {
                emptyText.classList.remove('hidden');
                suratList.classList.add('opacity-50');
            } else {
                emptyText.classList.add('hidden');
                suratList.classList.remove('opacity-50');
            }
        });
    </script>
</body>
</html>