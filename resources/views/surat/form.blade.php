<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat - {{ $jenis->name }}</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-background min-h-screen py-10 px-4 antialiased text-text-main selection:bg-primary selection:text-white">
    
    <div class="max-w-3xl mx-auto">
        <a href="{{ route('surat.pilih') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-primary mb-6 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-1">
                <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.612l4.158 3.96a.75.75 0 1 1-1.04 1.08l-5.5-5.25a.75.75 0 0 1 0-1.08l5.5-5.25a.75.75 0 1 1 1.04 1.08L5.612 9.25H16.25A.75.75 0 0 1 17 10Z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>

        <div class="bg-surface rounded-2xl shadow-sm border border-border-soft p-8 md:p-10">
            <div class="text-center mb-10">
                <h1 class="text-2xl md:text-3xl font-bold text-primary tracking-tight mb-2">
                    FORM {{ strtoupper($jenis->name) }}
                </h1>
                <p class="text-gray-500 text-sm">
                    Silakan lengkapi data di bawah ini dengan benar.
                </p>
            </div>

            <form action="{{ route('surat.proses') }}" method="POST">
                @csrf
                <input type="hidden" name="jenis_id" value="{{ $jenis->id }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6 mb-10">
                    @foreach ($fields as $name => $field)
                        {{-- Logic styling dinamis dipindah ke sini agar lebih rapi --}}
                        @php
                            $isError = $errors->has('detail.'.$name);
                            // Base styles untuk semua input
                            $baseClasses = 'w-full px-4 py-3.5 bg-surface text-text-main border rounded-xl outline-none transition-all duration-200 ease-in-out placeholder:text-gray-400 ';
                            
                            // State normal vs Error
                            if ($isError) {
                                $stateClasses = 'border-danger focus:ring-4 focus:ring-danger/10 focus:border-danger';
                            } else {
                                $stateClasses = 'border-border-soft focus:ring-4 focus:ring-primary/10 focus:border-primary hover:border-primary/50';
                            }

                            $finalClass = $baseClasses . $stateClasses;
                        @endphp

                        @if ($field['type'] === 'textarea')
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-text-main mb-2">
                                    {{ $field['label'] }} <span class="text-danger">*</span>
                                </label>
                                <textarea
                                    name="detail[{{ $name }}]"
                                    class="{{ $finalClass }}"
                                    rows="4"
                                    placeholder="Masukkan {{ strtolower($field['label']) }}..."
                                    {{ $field['required'] ? 'required' : '' }}
                                >{{ old('detail.'.$name) }}</textarea>

                                @error('detail.'.$name)
                                    <div class="mt-2 flex items-center text-danger text-sm font-medium animate-pulse">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @else
                            <div class="{{ $field['type'] === 'date' ? 'md:col-span-1' : 'md:col-span-1' }}"> <label class="block text-sm font-semibold text-text-main mb-2">
                                    {{ $field['label'] }} <span class="text-danger">*</span>
                                </label>

                                @if ($field['type'] === 'select')
                                    <div class="relative">
                                        <select
                                            name="detail[{{ $name }}]"
                                            class="{{ $finalClass }} appearance-none cursor-pointer"
                                            {{ $field['required'] ? 'required' : '' }}
                                        >
                                            <option value="" disabled {{ old('detail.'.$name) ? '' : 'selected' }}>-- Pilih {{ $field['label'] }} --</option>
                                            @foreach ($field['options'] as $option)
                                                <option value="{{ $option }}" {{ old('detail.'.$name) == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                @else
                                    <input
                                        type="{{ $field['type'] }}"
                                        name="detail[{{ $name }}]"
                                        value="{{ old('detail.'.$name) }}"
                                        class="{{ $finalClass }}"
                                        placeholder="{{ $field['label'] }}"
                                        {{ $field['required'] ? 'required' : '' }}
                                    />
                                @endif

                                @error('detail.'.$name)
                                    <div class="mt-2 flex items-center text-danger text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="mt-8">
                    <button
                        type="submit"
                        class="w-full py-4 px-6 bg-primary hover:bg-primary-hover text-white font-semibold text-lg rounded-xl 
                               shadow-glow transform transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0
                               focus:outline-none focus:ring-4 focus:ring-primary/30"
                    >
                        Buat Surat Sekarang
                    </button>
                    
                    <p class="text-center text-xs text-gray-400 mt-6">
                        Dengan menekan tombol di atas, Anda menyatakan data yang diisi adalah benar dan sesuai dokumen resmi (KK/KTP).
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>