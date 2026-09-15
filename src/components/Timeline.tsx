import { motion } from 'framer-motion';
import { Calendar, Clock, FileText, CheckCircle, UserCheck, GraduationCap } from 'lucide-react';

const timelineData = [
  {
    icon: Calendar,
    title: 'Pendaftaran Online',
    date: '1 Januari - 30 Juni 2027',
    desc: 'Isi formulir pendaftaran online dan upload dokumen yang diperlukan.',
    color: 'bg-blue-500',
  },
  {
    icon: FileText,
    title: 'Verifikasi Berkas',
    date: '1 - 14 Juli 2027',
    desc: 'Tim admisi akan memverifikasi kelengkapan berkas pendaftaran.',
    color: 'bg-indigo-500',
  },
  {
    icon: Clock,
    title: 'Tes Seleksi',
    date: '20 - 25 Juli 2027',
    desc: 'Tes potensi akademik, tes bahasa Inggris, dan wawancara.',
    color: 'bg-purple-500',
  },
  {
    icon: CheckCircle,
    title: 'Pengumuman',
    date: '1 Agustus 2027',
    desc: 'Hasil seleksi diumumkan melalui website dan email terdaftar.',
    color: 'bg-green-500',
  },
  {
    icon: UserCheck,
    title: 'Registrasi Ulang',
    date: '5 - 15 Agustus 2027',
    desc: 'Pembayaran UKT dan registrasi ulang untuk mahasiswa diterima.',
    color: 'bg-orange-500',
  },
  {
    icon: GraduationCap,
    title: 'Awal Kuliah',
    date: 'September 2027',
    desc: 'Kegiatan orientasi dan awal perkuliahan semester ganjil.',
    color: 'bg-red-500',
  },
];

export default function Timeline() {
  return (
    <section id="timeline" className="py-20 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <span className="inline-block px-4 py-1 bg-purple-100 text-purple-700 text-sm font-semibold rounded-full mb-4">
            Jadwal PMB
          </span>
          <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Alur & <span className="text-purple-600">Jadwal Pendaftaran</span>
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Ikuti setiap tahapan pendaftaran dengan cermat agar proses seleksi berjalan lancar.
          </p>
        </motion.div>

        {/* Timeline */}
        <div className="relative">
          {/* Vertical line */}
          <div className="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gray-200 transform md:-translate-x-1/2"></div>

          <div className="space-y-12">
            {timelineData.map((item, index) => (
              <motion.div
                key={item.title}
                initial={{ opacity: 0, y: 30 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: index * 0.1 }}
                className={`relative flex flex-col md:flex-row items-start gap-8 ${
                  index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse'
                }`}
              >
                {/* Content */}
                <div className={`flex-1 ml-16 md:ml-0 ${index % 2 === 0 ? 'md:text-right md:pr-12' : 'md:text-left md:pl-12'}`}>
                  <div className={`bg-white rounded-2xl p-6 shadow-md border border-gray-100 inline-block ${index % 2 === 0 ? 'md:ml-auto' : ''}`}>
                    <div className="flex items-center gap-3 mb-2">
                      <div className={`w-8 h-8 ${item.color} rounded-lg flex items-center justify-center`}>
                        <item.icon className="w-4 h-4 text-white" />
                      </div>
                      <h3 className="text-lg font-bold text-gray-900">{item.title}</h3>
                    </div>
                    <p className="text-sm font-semibold text-blue-600 mb-2">{item.date}</p>
                    <p className="text-gray-600 text-sm">{item.desc}</p>
                  </div>
                </div>

                {/* Center dot */}
                <div className="absolute left-6 md:left-1/2 w-5 h-5 bg-white border-4 border-blue-500 rounded-full transform -translate-x-1/2 mt-8 z-10"></div>

                {/* Empty space for other side */}
                <div className="flex-1 hidden md:block"></div>
              </motion.div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
