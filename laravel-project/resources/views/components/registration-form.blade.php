{{-- Registration Form Component --}}
<section id="register" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full mb-4">
                Formulir Pendaftaran
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Daftar <span class="text-blue-600">Sekarang</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Isi formulir di bawah ini dengan data yang benar dan lengkap.
            </p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-8 bg-green-50 rounded-2xl p-8 border border-green-200">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pendaftaran Berhasil!</h3>
                    <p class="text-gray-600 mb-4">
                        Terima kasih telah mendaftar di STT Pro. Nomor pendaftaran kamu:
                    </p>
                    <div class="bg-white rounded-xl p-4 inline-block">
                        <p class="text-lg font-bold text-blue-600">{{ session('pendaftar')->no_pendaftaran }}</p>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">Silakan cek email untuk informasi selanjutnya.</p>
                </div>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('pendaftaran.store') }}" method="POST" class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
            @csrf

            {{-- Data Pribadi --}}
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Data Pribadi
                </h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('full_name') border-red-300 bg-red-50 @enderror"
                            placeholder="Masukkan nama lengkap">
                        @error('full_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('email') border-red-300 bg-red-50 @enderror"
                            placeholder="email@example.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('phone') border-red-300 bg-red-50 @enderror"
                            placeholder="08xxxxxxxxxx">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            placeholder="Kota kelahiran">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="gender" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('gender') border-red-300 bg-red-50 @enderror">
                            <option value="">Pilih...</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="address" rows="2"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition resize-none"
                            placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Data Pendidikan --}}
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                    Data Pendidikan
                </h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" name="school" value="{{ old('school') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            placeholder="Nama SMA/SMK/MA">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Lulus</label>
                        <input type="text" name="graduation_year" value="{{ old('graduation_year') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            placeholder="2026">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi Pilihan <span class="text-red-500">*</span></label>
                        <select name="program" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('program') border-red-300 bg-red-50 @enderror">
                            <option value="">Pilih Program Studi...</option>
                            @php
                                $programOptions = [
                                    'Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer',
                                    'Kecerdasan Buatan', 'Keamanan Siber', 'Teknik Telekomunikasi',
                                    'Data Science', 'Desain Digital',
                                ];
                            @endphp
                            @foreach($programOptions as $opt)
                                <option value="{{ $opt }}" {{ old('program') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>
                        @error('program')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Data Orang Tua/Wali
                </h3>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Orang Tua/Wali</label>
                        <input type="text" name="parent_name" value="{{ old('parent_name') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon Orang Tua</label>
                        <input type="tel" name="parent_phone" value="{{ old('parent_phone') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                            placeholder="08xxxxxxxxxx">
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Kirim Pendaftaran
            </button>

            <p class="text-center text-xs text-gray-500 mt-4">
                Dengan mendaftar, kamu menyetujui syarat dan ketentuan PMB STT Pro 2026/2027.
            </p>
        </form>
    </div>
</section>
