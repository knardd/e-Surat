<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Jenis Surat</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="mx-auto bg-gradient-to-br from-blue-500 to-indigo-600 w-full p-6">
            <h1 class="text-2xl font-bold text-white mb-8 text-center">
                PILIH JENIS SURAT
            </h1>
    
            <!-- Search Input -->
            <div class="mb-16 flex items-center">
                <div class="relative w-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-gray-400 pointer-events-none">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari jenis surat..."
                        class="bg-white w-full pl-11 pr-4 py-3.5 text-base border border-gray-200 rounded-xl shadow-sm
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150"
                    />
                </div>
            </div>

        <div class="bg-white rounded-2xl p-6">
            <!-- Surat List -->
            <div id="suratList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($jenis as $item)
                    <a
                        href="{{ route('surat.form', $item->slug) }}"
                        class="surat-item block h-52 bg-blue-100 border-gray-200 rounded-xl p-6 shadow transition-all duration-200 ease-out hover:shadow-md hover:border-blue-400 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        data-name="{{ strtolower($item->name) }}"
                    >
                        <h2 class="text-base font-semibold text-gray-800 leading-tight line-clamp-2 justify-center">
                            {{ $item->name }}
                        </h2>
                    </a>
                @endforeach
            </div>
    
            <!-- Empty State -->
            <p id="emptyText" class="hidden text-center text-gray-500 mt-10 text-sm opacity-75">
                Tidak ada jenis surat ditemukan
            </p>
        </div>
    </div>

    <!-- Script tidak diubah sama sekali -->
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