import { motion } from 'framer-motion';
import { FileText, User, GraduationCap, CreditCard, CheckSquare } from 'lucide-react';

const requirements = [
  {
    icon: User,
    title: 'Data Pribadi',
    items: [
      'Fotokopi KTP / Kartu Pelajar',
      'Fotokopi Kartu Keluarga',
      'Pas foto 3x4 (4 lembar)',
      'Email aktif & nomor telepon',
    ],
  },
  {
    icon: GraduationCap,
    title: 'Ijazah & Transkrip',
    items: [
      'Fotokopi Ijazah SMA/SMK/MA',
      'Fotokopi Transkrip Nilai',
      'Surat Keterangan Lulus (jika belum ijazah)',
      'Rapor semester 1-5/6',
    ],
  },
  {
    icon: FileText,
    title: 'Dokumen Tambahan',
    items: [
      'Surat keterangan sehat dari dokter',
      'Sertifikat prestasi (jika ada)',
      'Surat rekomendasi (opsional)',
      'Portofolio (khusus Desain Digital)',
    ],
  },
  {
    icon: CreditCard,
    title: 'Biaya Pendaftaran',
    items: [
      'Biaya pendaftaran: Rp 250.000',
      'Pembayaran via transfer bank',
      'Bukti transfer diupload saat daftar',
      'Biaya dapat dikembalikan jika tidak lolos',
    ],
  },
];

const conditions = [
  'Lulus SMA/SMK/MA atau sederajat',
  'Sehat jasmani dan rohani',
  'Tidak buta warna (untuk program tertentu)',
  'Bersedia mematuhi peraturan kampus',
  'Membayar biaya pendaftaran',
];

export default function Requirements() {
  return (
    <section id="requirements" className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <span className="inline-block px-4 py-1 bg-green-100 text-green-700 text-sm font-semibold rounded-full mb-4">
            Persyaratan
          </span>
          <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Syarat <span className="text-green-600">Pendaftaran</span>
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Pastikan kamu telah menyiapkan semua dokumen yang diperlukan sebelum mendaftar.
          </p>
        </motion.div>

        {/* Requirements Cards */}
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
          {requirements.map((req, index) => (
            <motion.div
              key={req.title}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              className="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-shadow"
            >
              <div className="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                <req.icon className="w-6 h-6 text-green-600" />
              </div>
              <h3 className="text-lg font-bold text-gray-900 mb-4">{req.title}</h3>
              <ul className="space-y-2">
                {req.items.map((item, i) => (
                  <li key={i} className="flex items-start gap-2 text-sm text-gray-600">
                    <span className="w-1.5 h-1.5 bg-green-500 rounded-full mt-2 flex-shrink-0"></span>
                    {item}
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>

        {/* General Conditions */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100"
        >
          <h3 className="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
            <CheckSquare className="w-6 h-6 text-green-600" />
            Syarat Umum Pendaftar
          </h3>
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {conditions.map((cond, index) => (
              <div key={index} className="flex items-center gap-3 bg-white rounded-xl p-3 shadow-sm">
                <CheckSquare className="w-5 h-5 text-green-500 flex-shrink-0" />
                <span className="text-sm text-gray-700 font-medium">{cond}</span>
              </div>
            ))}
          </div>
        </motion.div>
      </div>
    </section>
  );
}
