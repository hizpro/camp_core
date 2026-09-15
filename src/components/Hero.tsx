import { ArrowRight, Users, BookOpen, Award, Calendar } from 'lucide-react';

export default function Hero() {
  const scrollToRegister = () => {
    const element = document.getElementById('register');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <section id="home" className="relative min-h-screen flex items-center overflow-hidden">
      {/* Background */}
      <div className="absolute inset-0 bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900">
        <div className="absolute inset-0 opacity-20">
          <div className="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full blur-3xl animate-pulse"></div>
          <div className="absolute bottom-20 right-10 w-96 h-96 bg-purple-400 rounded-full blur-3xl animate-pulse"></div>
          <div className="absolute top-1/2 left-1/2 w-64 h-64 bg-indigo-400 rounded-full blur-3xl animate-pulse"></div>
        </div>
        {/* Grid pattern */}
        <div className="absolute inset-0 opacity-5" style={{
          backgroundImage: 'linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px)',
          backgroundSize: '50px 50px'
        }}></div>
      </div>

      <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Left Content */}
          <div className="animate-fade-in-up">
            <div className="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-6">
              <Calendar className="w-4 h-4 text-blue-300" />
              <span className="text-sm text-blue-100">Pendaftaran Dibuka 2026/2027</span>
            </div>

            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
              Sekolah Tinggi
              <span className="block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300">
                Teknologi Pro
              </span>
            </h1>

            <p className="text-lg text-blue-100/80 mb-8 max-w-lg">
              Wujudkan masa depan cerahmu bersama STT Pro. Bergabunglah dengan ribuan alumni sukses 
              yang telah membangun karir di bidang teknologi dan informasi.
            </p>

            <div className="flex flex-wrap gap-4">
              <button
                onClick={scrollToRegister}
                className="group px-8 py-4 bg-white text-blue-900 font-bold rounded-xl hover:bg-blue-50 transition-all shadow-xl hover:shadow-2xl flex items-center gap-2"
              >
                Daftar Sekarang
                <ArrowRight className="w-5 h-5 group-hover:translate-x-1 transition-transform" />
              </button>
              <button
                onClick={() => {
                  const el = document.getElementById('programs');
                  if (el) el.scrollIntoView({ behavior: 'smooth' });
                }}
                className="px-8 py-4 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition-all"
              >
                Lihat Program Studi
              </button>
            </div>
          </div>

          {/* Right Content - Stats */}
          <div className="hidden lg:block animate-fade-in-up-delay">
            <div className="grid grid-cols-2 gap-4">
              <div className="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:scale-105 transition-transform duration-300">
                <Users className="w-10 h-10 text-blue-300 mb-3" />
                <h3 className="text-3xl font-bold text-white">5000+</h3>
                <p className="text-blue-200 text-sm">Mahasiswa Aktif</p>
              </div>
              <div className="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:scale-105 transition-transform duration-300">
                <BookOpen className="w-10 h-10 text-purple-300 mb-3" />
                <h3 className="text-3xl font-bold text-white">8</h3>
                <p className="text-blue-200 text-sm">Program Studi</p>
              </div>
              <div className="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:scale-105 transition-transform duration-300">
                <Award className="w-10 h-10 text-green-300 mb-3" />
                <h3 className="text-3xl font-bold text-white">A</h3>
                <p className="text-blue-200 text-sm">Akreditasi</p>
              </div>
              <div className="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:scale-105 transition-transform duration-300">
                <Award className="w-10 h-10 text-yellow-300 mb-3" />
                <h3 className="text-3xl font-bold text-white">95%</h3>
                <p className="text-blue-200 text-sm">Tingkat Kelulusan</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Bottom Wave */}
      <div className="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
      </div>
    </section>
  );
}
