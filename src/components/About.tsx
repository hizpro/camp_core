import { motion } from 'framer-motion';
import { Target, Eye, Heart, CheckCircle } from 'lucide-react';

export default function About() {
  const values = [
    { icon: Target, title: 'Visi', desc: 'Menjadi perguruan tinggi teknologi terkemuka yang menghasilkan lulusan berkompeten dan berdaya saing global.' },
    { icon: Eye, title: 'Misi', desc: 'Menyelenggarakan pendidikan berkualitas, penelitian inovatif, dan pengabdian masyarakat berbasis teknologi.' },
    { icon: Heart, title: 'Nilai', desc: 'Integritas, Inovasi, Kolaborasi, dan Excellence dalam setiap aspek pendidikan dan pelayanan.' },
  ];

  const advantages = [
    'Kurikulum berbasis industri & teknologi terkini',
    'Dosen berpengalaman dari praktisi & akademisi',
    'Fasilitas laboratorium modern & lengkap',
    'Kerja sama dengan 100+ perusahaan teknologi',
    'Program magang & sertifikasi profesional',
    'Beasiswa untuk mahasiswa berprestasi',
  ];

  return (
    <section id="about" className="py-20 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <span className="inline-block px-4 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full mb-4">
            Tentang Kami
          </span>
          <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Mengapa Memilih <span className="text-blue-600">STT Pro</span>?
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            STT Pro adalah perguruan tinggi teknologi yang berdedikasi mencetak lulusan berkualitas 
            dengan kompetensi yang dibutuhkan industri saat ini.
          </p>
        </motion.div>

        {/* Values */}
        <div className="grid md:grid-cols-3 gap-8 mb-16">
          {values.map((item, index) => (
            <motion.div
              key={item.title}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6, delay: index * 0.1 }}
              className="text-center p-8 rounded-2xl bg-gradient-to-b from-gray-50 to-white border border-gray-100 hover:shadow-xl transition-shadow"
            >
              <div className="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                <item.icon className="w-8 h-8 text-blue-600" />
              </div>
              <h3 className="text-xl font-bold text-gray-900 mb-3">{item.title}</h3>
              <p className="text-gray-600">{item.desc}</p>
            </motion.div>
          ))}
        </div>

        {/* Advantages */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 sm:p-12"
        >
          <h3 className="text-2xl font-bold text-gray-900 mb-8 text-center">Keunggulan Kami</h3>
          <div className="grid sm:grid-cols-2 gap-4">
            {advantages.map((adv, index) => (
              <motion.div
                key={index}
                initial={{ opacity: 0, x: -20 }}
                whileInView={{ opacity: 1, x: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.4, delay: index * 0.1 }}
                className="flex items-center gap-3 bg-white rounded-xl p-4 shadow-sm"
              >
                <CheckCircle className="w-5 h-5 text-green-500 flex-shrink-0" />
                <span className="text-gray-700 font-medium">{adv}</span>
              </motion.div>
            ))}
          </div>
        </motion.div>
      </div>
    </section>
  );
}
