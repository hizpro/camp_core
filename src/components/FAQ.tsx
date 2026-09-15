import { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { ChevronDown, HelpCircle } from 'lucide-react';

const faqData = [
  {
    question: 'Kapan batas akhir pendaftaran PMB 2026/2027?',
    answer: 'Pendaftaran PMB STT Pro Tahun Akademik 2026/2027 dibuka mulai 1 Januari hingga 30 Juni 2027. Pastikan kamu mendaftar sebelum batas waktu yang ditentukan.',
  },
  {
    question: 'Apakah ada biaya pendaftaran?',
    answer: 'Ya, biaya pendaftaran adalah Rp 250.000 yang dapat dibayarkan melalui transfer bank. Biaya ini mencakup proses verifikasi berkas dan tes seleksi.',
  },
  {
    question: 'Apa saja tes yang harus diikuti saat seleksi?',
    answer: 'Tes seleksi terdiri dari Tes Potensi Akademik (TPA), Tes Bahasa Inggris, dan Wawancara. Semua tes dapat dilakukan secara online.',
  },
  {
    question: 'Apakah tersedia program beasiswa?',
    answer: 'Ya, STT Pro menyediakan berbagai program beasiswa meliputi Beasiswa Prestasi Akademik, Beasiswa Tidak Mampu, Beasiswa Olahraga/Seni, dan Beasiswa Mitra Industri.',
  },
  {
    question: 'Bagaimana sistem pembayaran UKT?',
    answer: 'UKT (Uang Kuliah Tunggal) dapat dibayar per semester. Tersedia juga opsi cicilan untuk meringankan beban pembayaran. Besaran UKT bervariasi sesuai program studi.',
  },
  {
    question: 'Apakah lulusan SMA jurusan IPA saja yang bisa mendaftar?',
    answer: 'Tidak. Kami menerima lulusan dari semua jurusan SMA/SMK/MA. Yang penting adalah kamu memiliki minat di bidang teknologi dan informasi.',
  },
  {
    question: 'Bagaimana jika saya belum menerima ijazah?',
    answer: 'Kamu dapat menggunakan Surat Keterangan Lulus (SKL) dari sekolah sebagai pengganti sementara. Ijazah asli dapat diserahkan saat registrasi ulang.',
  },
  {
    question: 'Apakah ada kelas karyawan/ekstensi?',
    answer: 'Ya, beberapa program studi menyediakan kelas sore/malam untuk mahasiswa yang bekerja. Silakan hubungi admisi untuk informasi lebih lanjut.',
  },
];

export default function FAQ() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  return (
    <section id="faq" className="py-20 bg-gray-50">
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-12"
        >
          <span className="inline-block px-4 py-1 bg-amber-100 text-amber-700 text-sm font-semibold rounded-full mb-4">
            FAQ
          </span>
          <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Pertanyaan <span className="text-amber-600">Umum</span>
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Temukan jawaban untuk pertanyaan yang sering diajukan seputar PMB STT Pro.
          </p>
        </motion.div>

        {/* FAQ Items */}
        <div className="space-y-3">
          {faqData.map((faq, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.4, delay: index * 0.05 }}
              className="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm"
            >
              <button
                onClick={() => setOpenIndex(openIndex === index ? null : index)}
                className="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition-colors"
              >
                <div className="flex items-center gap-3">
                  <HelpCircle className="w-5 h-5 text-amber-500 flex-shrink-0" />
                  <span className="font-semibold text-gray-900">{faq.question}</span>
                </div>
                <ChevronDown
                  className={`w-5 h-5 text-gray-400 transition-transform flex-shrink-0 ${
                    openIndex === index ? 'rotate-180' : ''
                  }`}
                />
              </button>
              <AnimatePresence>
                {openIndex === index && (
                  <motion.div
                    initial={{ height: 0, opacity: 0 }}
                    animate={{ height: 'auto', opacity: 1 }}
                    exit={{ height: 0, opacity: 0 }}
                    transition={{ duration: 0.3 }}
                    className="overflow-hidden"
                  >
                    <div className="px-5 pb-5 pl-13 ml-8">
                      <p className="text-gray-600 leading-relaxed">{faq.answer}</p>
                    </div>
                  </motion.div>
                )}
              </AnimatePresence>
            </motion.div>
          ))}
        </div>

        {/* Contact CTA */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="mt-12 text-center bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white"
        >
          <h3 className="text-xl font-bold mb-2">Masih ada pertanyaan?</h3>
          <p className="text-blue-100 mb-4">Hubungi tim admisi kami untuk bantuan lebih lanjut.</p>
          <div className="flex flex-wrap justify-center gap-4">
            <a href="mailto:info@sttpro.ac.id" className="px-6 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
              ✉️ info@sttpro.ac.id
            </a>
            <a href="tel:+622112345678" className="px-6 py-2 bg-white/20 text-white font-semibold rounded-lg hover:bg-white/30 transition-colors border border-white/30">
              📞 (021) 1234-5678
            </a>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
