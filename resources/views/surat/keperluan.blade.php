<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Jenis Surat</title>
    @vite('resources/css/app.css') 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-background text-text-main antialiased selection:bg-primary selection:text-white">
    
    <div class="mx-auto w-full max-w-7xl p-6 md:p-12">
        
        <div class="mb-12 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-primary tracking-tight mb-2">
                Pilih Jenis Surat
            </h1>
            <p class="text-gray-500 text-sm md:text-base">
                Silakan pilih template surat yang ingin Anda buat di bawah ini
            </p>
        </div>

        <div class="mb-12 flex justify-center">
            <div class="relative w-full max-w-2xl group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                     class="absolute left-5 top-1/2 -translate-y-1/2 size-6 text-gray-400 group-focus-within:text-primary transition-colors duration-200 pointer-events-none">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari jenis surat (contoh: Surat Keterangan)..."
                    class="w-full bg-surface pl-14 pr-6 py-4 text-base font-medium text-text-main 
                           border border-border-soft rounded-2xl shadow-sm
                           placeholder:text-gray-400
                           focus:ring-4 focus:ring-primary/10 focus:border-primary 
                           outline-none transition-all duration-200 ease-in-out"
                />
            </div>
        </div>

        <div class="relative min-h-[400px]">
            <div id="suratList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 transition-opacity duration-200">
                @foreach ($jenis as $item)
                    <a
                        href="{{ route('surat.form', $item->slug) }}"
                        class="surat-item group relative flex flex-col justify-between h-48 p-6 
                               bg-surface rounded-2xl border border-border-soft
                               shadow-sm hover:shadow-xl hover:shadow-primary/5
                               hover:border-primary/50 hover:-translate-y-1 
                               focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                               transition-all duration-300 ease-out"
                        data-name="{{ strtolower($item->name) }}"
                    >
                    <div class="flex justify-center items-center h-20 transition-transform duration-300 group-hover:scale-110">
                        @include('components.icons.' . $item->slug)
                    </div>

                        <h2 class="text-lg font-semibold text-text-main leading-snug line-clamp-2 group-hover:text-primary transition-colors">
                            {{ $item->name }}
                        </h2>
                    </a>
                @endforeach
            </div>
    
            <div id="emptyText" class="hidden absolute inset-0 flex flex-col items-center justify-center text-center mt-10">
                <div class="bg-surface p-4 rounded-full mb-3 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>
                <p class="text-text-main font-medium">Tidak ada jenis surat ditemukan</p>
                <p class="text-gray-400 text-sm">Coba gunakan kata kunci lain.</p>
            </div>
        </div>
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
                    item.classList.add('flex'); // Pastikan display kembali ke flex
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                    item.classList.remove('flex');
                }
            });

            if (visibleCount === 0 && keyword !== '') {
                emptyText.classList.remove('hidden');
                suratList.classList.add('opacity-0', 'pointer-events-none'); // Hide list cleanly
            } else {
                emptyText.classList.add('hidden');
                suratList.classList.remove('opacity-0', 'pointer-events-none');
            }
        });
    </script>
</body>
</html>