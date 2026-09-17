{{-- About Component --}}
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full mb-4">
                Tentang Kami
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Mengapa Memilih <span class="text-blue-600">STT Pro</span>?
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                STT Pro adalah perguruan tinggi teknologi yang berdedikasi mencetak lulusan berkualitas
                dengan kompetensi yang dibutuhkan industri saat ini.
            </p>
        </div>

        {{-- Values --}}
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- Visi --}}
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-gray-50 to-white border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
                <p class="text-gray-600">Menjadi perguruan tinggi teknologi terkemuka yang menghasilkan lulusan berkompeten dan berdaya saing global.</p>
            </div>

            {{-- Misi --}}
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-gray-50 to-white border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
                <p class="text-gray-600">Menyelenggarakan pendidikan berkualitas, penelitian inovatif, dan pengabdian masyarakat berbasis teknologi.</p>
            </div>

            {{-- Nilai --}}
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-gray-50 to-white border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Nilai</h3>
                <p class="text-gray-600">Integritas, Inovasi, Kolaborasi, dan Excellence dalam setiap aspek pendidikan dan pelayanan.</p>
            </div>
        </div>

        {{-- Advantages --}}
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 sm:p-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Keunggulan Kami</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                @php
                    $advantages = [
                        'Kurikulum berbasis industri & teknologi terkini',
                        'Dosen berpengalaman dari praktisi & akademisi',
                        'Fasilitas laboratorium modern & lengkap',
                        'Kerja sama dengan 100+ perusahaan teknologi',
                        'Program magang & sertifikasi profesional',
                        'Beasiswa untuk mahasiswa berprestasi',
                    ];
                @endphp
                @foreach($advantages as $adv)
                    <div class="flex items-center gap-3 bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-gray-700 font-medium">{{ $adv }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
