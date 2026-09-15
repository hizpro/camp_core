{{-- Timeline Component --}}
<section id="timeline" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full mb-4">
                Jadwal PMB
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Alur & <span class="text-purple-600">Jadwal Pendaftaran</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ikuti setiap tahapan pendaftaran dengan cermat agar proses seleksi berjalan lancar.
            </p>
        </div>

        {{-- Timeline --}}
        <div class="relative">
            {{-- Vertical line --}}
            <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gray-200 transform md:-translate-x-1/2"></div>

            @php
                $timelineData = [
                    ['title' => 'Pendaftaran Online', 'date' => '1 Januari - 30 Juni 2027', 'desc' => 'Isi formulir pendaftaran online dan upload dokumen yang diperlukan.', 'color' => 'bg-blue-500', 'icon' => 'calendar'],
                    ['title' => 'Verifikasi Berkas', 'date' => '1 - 14 Juli 2027', 'desc' => 'Tim admisi akan memverifikasi kelengkapan berkas pendaftaran.', 'color' => 'bg-indigo-500', 'icon' => 'file'],
                    ['title' => 'Tes Seleksi', 'date' => '20 - 25 Juli 2027', 'desc' => 'Tes potensi akademik, tes bahasa Inggris, dan wawancara.', 'color' => 'bg-purple-500', 'icon' => 'clock'],
                    ['title' => 'Pengumuman', 'date' => '1 Agustus 2027', 'desc' => 'Hasil seleksi diumumkan melalui website dan email terdaftar.', 'color' => 'bg-green-500', 'icon' => 'check'],
                    ['title' => 'Registrasi Ulang', 'date' => '5 - 15 Agustus 2027', 'desc' => 'Pembayaran UKT dan registrasi ulang untuk mahasiswa diterima.', 'color' => 'bg-orange-500', 'icon' => 'user'],
                    ['title' => 'Awal Kuliah', 'date' => 'September 2027', 'desc' => 'Kegiatan orientasi dan awal perkuliahan semester ganjil.', 'color' => 'bg-red-500', 'icon' => 'graduation'],
                ];
            @endphp

            <div class="space-y-12">
                @foreach($timelineData as $index => $item)
                    <div class="relative flex flex-col md:flex-row items-start gap-8 {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                        {{-- Content --}}
                        <div class="flex-1 ml-16 md:ml-0 {{ $index % 2 === 0 ? 'md:text-right md:pr-12' : 'md:text-left md:pl-12' }}">
                            <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100 inline-block hover:shadow-lg transition-shadow duration-300 {{ $index % 2 === 0 ? 'md:ml-auto' : '' }}">
                                <div class="flex items-center gap-3 mb-2 {{ $index % 2 === 0 ? 'md:flex-row-reverse' : '' }}">
                                    <div class="w-8 h-8 {{ $item['color'] }} rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $item['title'] }}</h3>
                                </div>
                                <p class="text-sm font-semibold text-blue-600 mb-2">{{ $item['date'] }}</p>
                                <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                            </div>
                        </div>

                        {{-- Center dot --}}
                        <div class="absolute left-6 md:left-1/2 w-5 h-5 bg-white border-4 border-blue-500 rounded-full transform -translate-x-1/2 mt-8 z-10"></div>

                        {{-- Empty space --}}
                        <div class="flex-1 hidden md:block"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
