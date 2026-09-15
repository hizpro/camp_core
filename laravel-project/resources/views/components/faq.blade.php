{{-- FAQ Component --}}
<section id="faq" class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1 bg-amber-100 text-amber-700 text-sm font-semibold rounded-full mb-4">
                FAQ
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Pertanyaan <span class="text-amber-600">Umum</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan jawaban untuk pertanyaan yang sering diajukan seputar PMB STT Pro.
            </p>
        </div>

        {{-- FAQ Items --}}
        @php
            $faqData = [
                ['q' => 'Kapan batas akhir pendaftaran PMB 2026/2027?', 'a' => 'Pendaftaran PMB STT Pro Tahun Akademik 2026/2027 dibuka mulai 1 Januari hingga 30 Juni 2027. Pastikan kamu mendaftar sebelum batas waktu yang ditentukan.'],
                ['q' => 'Apakah ada biaya pendaftaran?', 'a' => 'Ya, biaya pendaftaran adalah Rp 250.000 yang dapat dibayarkan melalui transfer bank. Biaya ini mencakup proses verifikasi berkas dan tes seleksi.'],
                ['q' => 'Apa saja tes yang harus diikuti saat seleksi?', 'a' => 'Tes seleksi terdiri dari Tes Potensi Akademik (TPA), Tes Bahasa Inggris, dan Wawancara. Semua tes dapat dilakukan secara online.'],
                ['q' => 'Apakah tersedia program beasiswa?', 'a' => 'Ya, STT Pro menyediakan berbagai program beasiswa meliputi Beasiswa Prestasi Akademik, Beasiswa Tidak Mampu, Beasiswa Olahraga/Seni, dan Beasiswa Mitra Industri.'],
                ['q' => 'Bagaimana sistem pembayaran UKT?', 'a' => 'UKT (Uang Kuliah Tunggal) dapat dibayar per semester. Tersedia juga opsi cicilan untuk meringankan beban pembayaran. Besaran UKT bervariasi sesuai program studi.'],
                ['q' => 'Apakah lulusan SMA jurusan IPA saja yang bisa mendaftar?', 'a' => 'Tidak. Kami menerima lulusan dari semua jurusan SMA/SMK/MA. Yang penting adalah kamu memiliki minat di bidang teknologi dan informasi.'],
                ['q' => 'Bagaimana jika saya belum menerima ijazah?', 'a' => 'Kamu dapat menggunakan Surat Keterangan Lulus (SKL) dari sekolah sebagai pengganti sementara. Ijazah asli dapat diserahkan saat registrasi ulang.'],
                ['q' => 'Apakah ada kelas karyawan/ekstensi?', 'a' => 'Ya, beberapa program studi menyediakan kelas sore/malam untuk mahasiswa yang bekerja. Silakan hubungi admisi untuk informasi lebih lanjut.'],
            ];
        @endphp

        <div class="space-y-3" x-data="{ open: 0 }">
            @foreach($faqData as $index => $faq)
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm">
                    <button onclick="toggleFaq({{ $index }})"
                        class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-semibold text-gray-900">{{ $faq['q'] }}</span>
                        </div>
                        <svg id="faq-icon-{{ $index }}" class="w-5 h-5 text-gray-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-answer-{{ $index }}" class="hidden px-5 pb-5 ml-8">
                        <p class="text-gray-600 leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Contact CTA --}}
        <div class="mt-12 text-center bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white">
            <h3 class="text-xl font-bold mb-2">Masih ada pertanyaan?</h3>
            <p class="text-blue-100 mb-4">Hubungi tim admisi kami untuk bantuan lebih lanjut.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="mailto:info@sttpro.ac.id" class="px-6 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                    ✉️ info@sttpro.ac.id
                </a>
                <a href="tel:+622112345678" class="px-6 py-2 bg-white/20 text-white font-semibold rounded-lg hover:bg-white/30 transition-colors border border-white/30">
                    📞 (021) 1234-5678
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function toggleFaq(index) {
        const answer = document.getElementById('faq-answer-' + index);
        const icon = document.getElementById('faq-icon-' + index);

        // Close all other FAQs
        document.querySelectorAll('[id^="faq-answer-"]').forEach((el, i) => {
            if (i !== index) {
                el.classList.add('hidden');
                document.getElementById('faq-icon-' + i).style.transform = 'rotate(0deg)';
            }
        });

        // Toggle current
        answer.classList.toggle('hidden');
        icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }
</script>
@endpush
