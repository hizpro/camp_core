import { motion } from 'framer-motion';
import { Monitor, Code, Database, Cpu, Shield, Wifi, BarChart3, Palette } from 'lucide-react';

const programs = [
  {
    icon: Code,
    name: 'Teknik Informatika',
    degree: 'S1',
    desc: 'Pelajari pemrograman, algoritma, dan pengembangan software untuk membangun solusi digital.',
    color: 'from-blue-500 to-blue-700',
    bgColor: 'bg-blue-50',
    textColor: 'text-blue-600',
  },
  {
    icon: Monitor,
    name: 'Sistem Informasi',
    degree: 'S1',
    desc: 'Kuasai manajemen teknologi informasi dan analisis bisnis untuk transformasi digital.',
    color: 'from-indigo-500 to-indigo-700',
    bgColor: 'bg-indigo-50',
    textColor: 'text-indigo-600',
  },
  {
    icon: Database,
    name: 'Teknik Komputer',
    degree: 'S1',
    desc: 'Dalami hardware, jaringan, dan arsitektur komputer untuk infrastruktur teknologi.',
    color: 'from-purple-500 to-purple-700',
    bgColor: 'bg-purple-50',
    textColor: 'text-purple-600',
  },
  {
    icon: Cpu,
    name: 'Kecerdasan Buatan',
    degree: 'S1',
    desc: 'Eksplorasi machine learning, deep learning, dan AI untuk memecahkan masalah kompleks.',
    color: 'from-emerald-500 to-emerald-700',
    bgColor: 'bg-emerald-50',
    textColor: 'text-emerald-600',
  },
  {
    icon: Shield,
    name: 'Keamanan Siber',
    degree: 'S1',
    desc: 'Pelajari cybersecurity, ethical hacking, dan proteksi sistem dari ancaman digital.',
    color: 'from-red-500 to-red-700',
    bgColor: 'bg-red-50',
    textColor: 'text-red-600',
  },
  {
    icon: Wifi,
    name: 'Teknik Telekomunikasi',
    degree: 'S1',
    desc: 'Kuasai teknologi komunikasi, jaringan nirkabel, dan infrastruktur telekomunikasi.',
    color: 'from-orange-500 to-orange-700',
    bgColor: 'bg-orange-50',
    textColor: 'text-orange-600',
  },
  {
    icon: BarChart3,
    name: 'Data Science',
    degree: 'S1',
    desc: 'Analisis data besar, statistik, dan visualisasi untuk pengambilan keputusan bisnis.',
    color: 'from-teal-500 to-teal-700',
    bgColor: 'bg-teal-50',
    textColor: 'text-teal-600',
  },
  {
    icon: Palette,
    name: 'Desain Digital',
    degree: 'D3',
    desc: 'Kreativitas dalam UI/UX design, multimedia, dan pengembangan konten digital.',
    color: 'from-pink-500 to-pink-700',
    bgColor: 'bg-pink-50',
    textColor: 'text-pink-600',
  },
];

export default function Programs() {
  return (
    <section id="programs" className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Section Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <span className="inline-block px-4 py-1 bg-indigo-100 text-indigo-700 text-sm font-semibold rounded-full mb-4">
            Program Studi
          </span>
          <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Pilihan Program <span className="text-indigo-600">Unggulan</span>
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Temukan program studi yang sesuai dengan minat dan bakatmu. Semua program kami 
            telah terakreditasi dan dirancang sesuai kebutuhan industri.
          </p>
        </motion.div>

        {/* Programs Grid */}
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          {programs.map((program, index) => (
            <motion.div
              key={program.name}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: index * 0.05 }}
              whileHover={{ y: -8 }}
              className="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl transition-all border border-gray-100 group cursor-pointer"
            >
              <div className={`w-14 h-14 ${program.bgColor} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform`}>
                <program.icon className={`w-7 h-7 ${program.textColor}`} />
              </div>
              <div className="flex items-center gap-2 mb-2">
                <span className="text-xs font-bold text-white bg-gradient-to-r from-blue-600 to-indigo-600 px-2 py-0.5 rounded-full">
                  {program.degree}
                </span>
              </div>
              <h3 className="text-lg font-bold text-gray-900 mb-2">{program.name}</h3>
              <p className="text-sm text-gray-600 leading-relaxed">{program.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
