<x-layout title="Form {{ $jenis->name }}">
    <div class="py-8 md:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">
            <!-- Breadcrumb -->
            <nav class="mb-6 animate-fade-in">
                <ol class="flex items-center gap-2 text-sm">
                    <li>
                        <a href="{{ route('surat.pilih') }}" class="text-text-muted hover:text-primary transition-colors inline-flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            Pilih Surat
                        </a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>
                    <li class="text-primary font-medium">Form Pengisian</li>
                </ol>
            </nav>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-card border border-border-soft overflow-hidden animate-slide-up">
                <!-- Card Header with Gradient -->
                <div class="hero-gradient px-6 py-5 md:px-8 md:py-6">
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0 p-3 bg-white/20 backdrop-blur rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold text-white">
                                {{ $jenis->name }}
                            </h1>
                            <p class="text-white/80 text-sm mt-0.5">
                                Silakan lengkapi data dengan benar
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <div class="p-6 md:p-8">
                    <form action="{{ route('surat.proses') }}" method="POST">
                        @csrf
                        <input type="hidden" name="jenis_id" value="{{ $jenis->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                            @foreach ($fields as $name => $field)
                                @php
                                    $isError = $errors->has('detail.'.$name);
                                    $errorClass = $isError ? 'has-error' : '';
                                @endphp

                                @if ($field['type'] === 'textarea')
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-semibold text-text-main mb-2">
                                            {{ $field['label'] }} <span class="text-danger">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute left-4 top-4 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <textarea
                                                name="detail[{{ $name }}]"
                                                class="input-field {{ $errorClass }} pl-12"
                                                rows="4"
                                                placeholder="Masukkan {{ strtolower($field['label']) }}..."
                                                {{ $field['required'] ? 'required' : '' }}
                                            >{{ old('detail.'.$name) }}</textarea>
                                        </div>
                                        @error('detail.'.$name)
                                            <div class="mt-2 flex items-center text-danger text-sm font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <div>
                                        <label class="block text-sm font-semibold text-text-main mb-2">
                                            {{ $field['label'] }} <span class="text-danger">*</span>
                                        </label>

                                        @if ($field['type'] === 'select')
                                            <div class="relative">
                                                <select
                                                    name="detail[{{ $name }}]"
                                                    class="input-field {{ $errorClass }} appearance-none cursor-pointer pr-10"
                                                    {{ $field['required'] ? 'required' : '' }}
                                                >
                                                    <option value="" disabled {{ old('detail.'.$name) ? '' : 'selected' }}>-- Pilih {{ $field['label'] }} --</option>
                                                    @foreach ($field['options'] as $option)
                                                        <option value="{{ $option }}" {{ old('detail.'.$name) == $option ? 'selected' : '' }}>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-muted">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        @else
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                                    @if ($name === 'nama')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                        </svg>
                                                    @elseif ($name === 'nik')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                                        </svg>
                                                    @elseif ($name === 'tempat_tanggal_lahir' || $name === 'tgl_lahir' || $field['type'] === 'date')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                                        </svg>
                                                    @elseif ($name === 'pekerjaan')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    @endif
                                                </div>
                                                <input
                                                    type="{{ $field['type'] }}"
                                                    name="detail[{{ $name }}]"
                                                    value="{{ old('detail.'.$name) }}"
                                                    class="input-field {{ $errorClass }} pl-12"
                                                    placeholder="{{ $field['label'] }}"
                                                    {{ $field['required'] ? 'required' : '' }}
                                                />
                                            </div>
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

                        <!-- Submit Section -->
                        <div class="mt-8 pt-6 border-t border-border-soft">
                            <button type="submit" class="btn-primary w-full text-lg py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Buat Surat Sekarang
                            </button>
                            
                            <p class="text-center text-xs text-text-muted mt-5">
                                Dengan menekan tombol di atas, Anda menyatakan data yang diisi adalah benar dan sesuai dokumen resmi.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>