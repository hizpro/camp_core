{{-- Programs Component --}}
<section id="programs" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1 bg-indigo-100 text-indigo-700 text-sm font-semibold rounded-full mb-4">
                Program Studi
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Pilihan Program <span class="text-indigo-600">Unggulan</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan program studi yang sesuai dengan minat dan bakatmu. Semua program kami
                telah terakreditasi dan dirancang sesuai kebutuhan industri.
            </p>
        </div>

        {{-- Programs Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $programs = [
                    ['icon' => 'code', 'name' => 'Teknik Informatika', 'degree' => 'S1', 'desc' => 'Pelajari pemrograman, algoritma, dan pengembangan software untuk membangun solusi digital.', 'bgColor' => 'bg-blue-50', 'textColor' => 'text-blue-600'],
                    ['icon' => 'monitor', 'name' => 'Sistem Informasi', 'degree' => 'S1', 'desc' => 'Kuasai manajemen teknologi informasi dan analisis bisnis untuk transformasi digital.', 'bgColor' => 'bg-indigo-50', 'textColor' => 'text-indigo-600'],
                    ['icon' => 'server', 'name' => 'Teknik Komputer', 'degree' => 'S1', 'desc' => 'Dalami hardware, jaringan, dan arsitektur komputer untuk infrastruktur teknologi.', 'bgColor' => 'bg-purple-50', 'textColor' => 'text-purple-600'],
                    ['icon' => 'cpu', 'name' => 'Kecerdasan Buatan', 'degree' => 'S1', 'desc' => 'Eksplorasi machine learning, deep learning, dan AI untuk memecahkan masalah kompleks.', 'bgColor' => 'bg-emerald-50', 'textColor' => 'text-emerald-600'],
                    ['icon' => 'shield', 'name' => 'Keamanan Siber', 'degree' => 'S1', 'desc' => 'Pelajari cybersecurity, ethical hacking, dan proteksi sistem dari ancaman digital.', 'bgColor' => 'bg-red-50', 'textColor' => 'text-red-600'],
                    ['icon' => 'wifi', 'name' => 'Teknik Telekomunikasi', 'degree' => 'S1', 'desc' => 'Kuasai teknologi komunikasi, jaringan nirkabel, dan infrastruktur telekomunikasi.', 'bgColor' => 'bg-orange-50', 'textColor' => 'text-orange-600'],
                    ['icon' => 'chart', 'name' => 'Data Science', 'degree' => 'S1', 'desc' => 'Analisis data besar, statistik, dan visualisasi untuk pengambilan keputusan bisnis.', 'bgColor' => 'bg-teal-50', 'textColor' => 'text-teal-600'],
                    ['icon' => 'palette', 'name' => 'Desain Digital', 'degree' => 'D3', 'desc' => 'Kreativitas dalam UI/UX design, multimedia, dan pengembangan konten digital.', 'bgColor' => 'bg-pink-50', 'textColor' => 'text-pink-600'],
                ];
            @endphp

            @foreach($programs as $program)
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group cursor-pointer hover:-translate-y-2">
                    <div class="w-14 h-14 {{ $program['bgColor'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        @switch($program['icon'])
                            @case('code')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                @break
                            @case('monitor')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                @break
                            @case('server')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                                @break
                            @case('cpu')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                                @break
                            @case('shield')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                @break
                            @case('wifi')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                                @break
                            @case('chart')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                @break
                            @case('palette')
                                <svg class="w-7 h-7 {{ $program['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                @break
                        @endswitch
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 px-2 py-0.5 rounded-full">
                            {{ $program['degree'] }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $program['name'] }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $program['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
