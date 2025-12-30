<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat</title>
    @vite('resources/css/app.css')
    <style>
        /* Opsional: pastikan font Inter tersedia */
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen py-8 px-4">
    
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-8">
                FORM {{ strtoupper($jenis->name) }}
            </h1>

            <form action="{{ route('surat.proses') }}" method="POST">
    @csrf
    <input type="hidden" name="jenis_id" value="{{ $jenis->id }}">

    @foreach ($fields as $name => $field)
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                {{ $field['label'] }}
            </label>

            @if ($field['type'] === 'textarea')
                <textarea
                    name="detail[{{ $name }}]"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg"
                    {{ $field['required'] ? 'required' : '' }}
                ></textarea>

            @elseif ($field['type'] === 'select')
                <select
                    name="detail[{{ $name }}]"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg"
                    {{ $field['required'] ? 'required' : '' }}
                >
                    <option value="">-- Pilih --</option>
                    @foreach ($field['options'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>

            @else
                <input
                    type="{{ $field['type'] }}"
                    name="detail[{{ $name }}]"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg"
                    {{ $field['required'] ? 'required' : '' }}
                />
            @endif
            @error('detail.'.$name)
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        </div>
    @endforeach

    <button class="w-full bg-indigo-600 text-white py-3 rounded-lg">
        Buat Surat
    </button>
</form>

            <!-- Note -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Pastikan data diisi dengan benar sesuai KK/KTP
            </p>
        </div>
    </div>
</body>
</html>