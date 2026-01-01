<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md ring-1 ring-gray-100 p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-800 text-center mb-8">
                FORM {{ strtoupper($jenis->name) }}
            </h1>

            <form action="{{ route('surat.proses') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis_id" value="{{ $jenis->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @foreach ($fields as $name => $field)
                        @if ($field['type'] === 'textarea')
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ $field['label'] }}
                                </label>
                                @php
                                    $isError = $errors->has('detail.'.$name);
                                    $textareaClass = 'w-full px-4 py-3 border rounded-lg focus:ring-2 outline-none transition duration-150 ';
                                    $textareaClass .= $isError
                                        ? 'border-red-500 focus:ring-red-500'
                                        : 'border-gray-200 focus:ring-blue-500 focus:border-blue-500';
                                @endphp
                                <textarea
                                    name="detail[{{ $name }}]"
                                    class="{{ $textareaClass }}"
                                    {{ $field['required'] ? 'required' : '' }}
                                >{{ old('detail.'.$name) }}</textarea>

                                @error('detail.'.$name)
                                    <div class="mt-1 flex items-center text-red-600 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @else
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    {{ $field['label'] }}
                                </label>

                                @if ($field['type'] === 'select')
                                    @php
                                        $isError = $errors->has('detail.'.$name);
                                        $selectClass = 'w-full px-4 py-3 border rounded-lg focus:ring-2 outline-none transition duration-150 appearance-none bg-white ';
                                        $selectClass .= $isError
                                            ? 'border-red-500 focus:ring-red-500'
                                            : 'border-gray-200 focus:ring-blue-500 focus:border-blue-500';
                                    @endphp
                                    <select
                                        name="detail[{{ $name }}]"
                                        class="{{ $selectClass }}"
                                        {{ $field['required'] ? 'required' : '' }}
                                    >
                                        <option value="">-- Pilih --</option>
                                        @foreach ($field['options'] as $option)
                                            <option value="{{ $option }}" {{ old('detail.'.$name) == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    @php
                                        $isError = $errors->has('detail.'.$name);
                                        $inputClass = 'w-full px-4 py-3 border rounded-lg focus:ring-2 outline-none transition duration-150 ';
                                        $inputClass .= $isError
                                            ? 'border-red-500 focus:ring-red-500'
                                            : 'border-gray-200 focus:ring-blue-500 focus:border-blue-500';
                                    @endphp
                                    <input
                                        type="{{ $field['type'] }}"
                                        name="detail[{{ $name }}]"
                                        value="{{ old('detail.'.$name) }}"
                                        class="{{ $inputClass }}"
                                        {{ $field['required'] ? 'required' : '' }}
                                    />
                                @endif

                                @error('detail.'.$name)
                                    <div class="mt-1 flex items-center text-red-600 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                    @endforeach
                </div>

                <button
                    type="submit"
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150"
                >
                    Buat Surat
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Pastikan data diisi dengan benar sesuai KK/KTP
            </p>
        </div>
    </div>
</body>
</html>