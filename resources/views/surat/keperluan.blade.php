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
    <h1>Pilih Jenis Surat</h1>
    <input type="text" id="searchInput" placeholder="Cari jenis surat..." class="w-full p-3 mb-4 border rounded-lg">
    <div class="flex flex-col">
    @foreach ( $jenis as $item )
        <a 
                    href="{{ route('surat.form', $item->id) }}"
                    class="block w-40 h-40 bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition"
                    data-name="{{ strtolower($item->name) }}"
                >
                    <h2 class="text-md font-semibold">
                        {{ $item->name }}
                    </h2>
    
                </a>
                @endforeach
            </div>
    <script>
    const searchInput = document.getElementById('searchInput');
    const suratItems = document.querySelectorAll('.surat-item');

    searchInput.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase();

        suratItems.forEach(item => {
            const name = item.dataset.name;

            if (name.includes(keyword)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>