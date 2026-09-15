import { GraduationCap, MapPin, Phone, Mail, Clock, Facebook, Instagram, Youtube, Linkedin } from 'lucide-react';

export default function Footer() {
  return (
    <footer className="bg-gray-900 text-white">
      {/* Main Footer */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
          {/* Brand */}
          <div className="lg:col-span-1">
            <div className="flex items-center gap-2 mb-4">
              <div className="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                <GraduationCap className="w-6 h-6 text-white" />
              </div>
              <div>
                <h3 className="text-lg font-bold">STT Pro</h3>
                <p className="text-xs text-gray-400">PMB 2026/2027</p>
              </div>
            </div>
            <p className="text-gray-400 text-sm leading-relaxed mb-4">
              Sekolah Tinggi Teknologi Pro - Mencetak lulusan berkompeten di bidang teknologi dan informasi untuk masa depan yang lebih baik.
            </p>
            <div className="flex gap-3">
              <a href="#" className="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                <Facebook className="w-4 h-4" />
              </a>
              <a href="#" className="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-pink-600 transition-colors">
                <Instagram className="w-4 h-4" />
              </a>
              <a href="#" className="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-600 transition-colors">
                <Youtube className="w-4 h-4" />
              </a>
              <a href="#" className="w-9 h-9 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                <Linkedin className="w-4 h-4" />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="text-sm font-bold uppercase tracking-wider text-gray-300 mb-4">Tautan Cepat</h4>
            <ul className="space-y-2">
              {['Beranda', 'Tentang Kami', 'Program Studi', 'Jadwal PMB', 'Persyaratan', 'Daftar Online'].map(link => (
                <li key={link}>
                  <a href="#" className="text-gray-400 text-sm hover:text-white transition-colors">{link}</a>
                </li>
              ))}
            </ul>
          </div>

          {/* Programs */}
          <div>
            <h4 className="text-sm font-bold uppercase tracking-wider text-gray-300 mb-4">Program Studi</h4>
            <ul className="space-y-2">
              {['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Kecerdasan Buatan', 'Keamanan Siber', 'Data Science'].map(prog => (
                <li key={prog}>
                  <a href="#programs" className="text-gray-400 text-sm hover:text-white transition-colors">{prog}</a>
                </li>
              ))}
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h4 className="text-sm font-bold uppercase tracking-wider text-gray-300 mb-4">Kontak</h4>
            <ul className="space-y-3">
              <li className="flex items-start gap-3">
                <MapPin className="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" />
                <span className="text-gray-400 text-sm">Jl. Teknologi No. 123, Jakarta Selatan 12345</span>
              </li>
              <li className="flex items-center gap-3">
                <Phone className="w-4 h-4 text-blue-400 flex-shrink-0" />
                <span className="text-gray-400 text-sm">(021) 1234-5678</span>
              </li>
              <li className="flex items-center gap-3">
                <Mail className="w-4 h-4 text-blue-400 flex-shrink-0" />
                <span className="text-gray-400 text-sm">info@sttpro.ac.id</span>
              </li>
              <li className="flex items-center gap-3">
                <Clock className="w-4 h-4 text-blue-400 flex-shrink-0" />
                <span className="text-gray-400 text-sm">Senin - Jumat, 08:00 - 16:00</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
          <div className="flex flex-col sm:flex-row justify-between items-center gap-4">
            <p className="text-gray-500 text-sm">
              © 2026 STT Pro - Sistem Penerimaan Mahasiswa Baru. All rights reserved.
            </p>
            <div className="flex gap-4">
              <a href="#" className="text-gray-500 text-sm hover:text-white transition-colors">Kebijakan Privasi</a>
              <a href="#" className="text-gray-500 text-sm hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
