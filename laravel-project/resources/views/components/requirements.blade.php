{{-- Requirements Component --}}
<section id="requirements" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 bg-green-100 text-green-700 text-sm font-semibold rounded-full mb-4">
                Persyaratan
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Syarat <span class="text-green-600">Pendaftaran</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Pastikan kamu telah menyiapkan semua dokumen yang diperlukan sebelum mendaftar.
            </p>
        </div>

        {{-- Requirements Cards --}}
        @php
            $requirements = [
                [
                    'title' => 'Data Pribadi',
                    'items' => ['Fotokopi KTP / Kartu Pelajar', 'Fotokopi Kartu Keluarga', 'Pas foto 3x4 (4 lembar)', 'Email aktif & nomor telepon'],
                ],
                [
                    'title' => 'Ijazah & Transkrip',
                    'items' => ['Fotokopi Ijazah SMA/SMK/MA', 'Fotokopi Transkrip Nilai', 'Surat Keterangan Lulus (jika belum ijazah)', 'Rapor semester 1-5/6'],
                ],
                [
                    'title' => 'Dokumen Tambahan',
                    'items' => ['Surat keterangan sehat dari dokter', 'Sertifikat prestasi (jika ada)', 'Surat rekomendasi (opsional)', 'Portofolio (khusus Desain Digital)'],
                ],
                [
                    'title' => 'Biaya Pendaftaran',
                    'items' => ['Biaya pendaftaran: Rp 250.000', 'Pembayaran via transfer bank', 'Bukti transfer diupload saat daftar', 'Biaya dapat dikembalikan jika tidak lolos'],
                ],
            ];
        @endphp

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @foreach($requirements as $req)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $req['title'] }}</h3>
                    <ul class="space-y-2">
                        @foreach($req['items'] as $item)
                            <li class="flex items-start gap-2 text-sm text-gray-600">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mt-2 flex-shrink-0"></span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        {{-- General Conditions --}}
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100">
            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
                Syarat Umum Pendaftar
            </h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                    $conditions = [
                        'Lulus SMA/SMK/MA atau sederajat',
                        'Sehat jasmani dan rohani',
                        'Tidak buta warna (untuk program tertentu)',
                        'Bersedia mematuhi peraturan kampus',
                        'Membayar biaya pendaftaran',
                    ];
                @endphp
                @foreach($conditions as $cond)
                    <div class="flex items-center gap-3 bg-white rounded-xl p-3 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm text-gray-700 font-medium">{{ $cond }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
