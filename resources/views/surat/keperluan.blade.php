<x-layout title="Pilih Jenis Surat">
    <div class="py-8 md:py-12">
        <!-- Hero Section -->
        <div class="relative overflow-hidden mb-10 md:mb-14">
            <div class="absolute inset-0 hero-gradient opacity-5 rounded-3xl"></div>
            <div class="relative max-w-4xl mx-auto px-4 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 text-primary text-sm font-medium rounded-full mb-4 animate-fade-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Layanan Surat Digital
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-text-main tracking-tight mb-4 animate-slide-up">
                    Pilih <span class="text-primary">Jenis Surat</span>
                </h1>
                <p class="text-text-muted text-base md:text-lg max-w-2xl mx-auto animate-slide-up" style="animation-delay: 0.1s">
                    Silakan pilih template surat yang ingin Anda buat. Proses cepat, mudah, dan terverifikasi secara digital.
                </p>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex justify-center animate-slide-up" style="animation-delay: 0.2s">
                <div class="relative w-full max-w-2xl group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
                             class="size-5 text-text-muted group-focus-within:text-primary transition-colors duration-200">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari jenis surat (contoh: Surat Keterangan Domisili)..."
                        class="input-field pl-14 py-4 text-base shadow-card focus:shadow-glow"
                    />
                </div>
            </div>

            <!-- Surat Grid -->
            <div class="relative min-h-[400px]">
                <div id="suratList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-6 transition-opacity duration-200">
                    @foreach ($jenis as $index => $item)
                        <a
                            href="{{ route('surat.form', $item->slug) }}"
                            class="surat-item group card-interactive relative flex flex-col h-52 p-6 
                                   bg-white rounded-2xl border border-border-soft shadow-card
                                   hover:border-primary-200 
                                   focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                                   animate-slide-up"
                            style="animation-delay: {{ 0.05 * $index }}s"
                            data-name="{{ strtolower($item->name) }}"
                        >
                            <!-- Icon -->
                            <div class="flex justify-center mb-4">
                                <div class="icon-container">
                                    @include('components.icons.' . $item->slug)
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="mt-auto text-center">
                                <h2 class="text-base font-semibold text-text-main leading-snug group-hover:text-primary transition-colors">
                                    {{ $item->name }}
                                </h2>
                            </div>

                            <!-- Hover Arrow -->
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-2 group-hover:translate-x-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Empty State -->
                <div id="emptyText" class="hidden absolute inset-0 flex flex-col items-center justify-center text-center">
                    <div class="bg-primary-50 p-5 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <p class="text-text-main font-semibold text-lg mb-1">Tidak ada hasil ditemukan</p>
                    <p class="text-text-muted text-sm">Coba gunakan kata kunci yang berbeda</p>
                </div>
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
                    item.classList.add('flex');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                    item.classList.remove('flex');
                }
            });

            if (visibleCount === 0 && keyword !== '') {
                emptyText.classList.remove('hidden');
                suratList.classList.add('opacity-0', 'pointer-events-none');
            } else {
                emptyText.classList.add('hidden');
                suratList.classList.remove('opacity-0', 'pointer-events-none');
            }
        });
    </script>
</x-layout>