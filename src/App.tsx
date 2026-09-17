import { useState } from 'react';
import { 
  FolderTree, FileCode, Database, Layout, Shield, 
  ChevronRight, ChevronDown, Copy, Check, ExternalLink,
  Server, Code2, Table2, FormInput, Eye
} from 'lucide-react';

interface FileNode {
  name: string;
  path: string;
  type: 'folder' | 'file';
  icon?: string;
  children?: FileNode[];
  description?: string;
}

const projectStructure: FileNode[] = [
  {
    name: 'app/',
    path: 'app',
    type: 'folder',
    children: [
      {
        name: 'Filament/Resources/',
        path: 'app/Filament/Resources',
        type: 'folder',
        children: [
          { name: 'PendaftarResource.php', path: 'app/Filament/Resources/PendaftarResource.php', type: 'file', description: 'Resource utama Filament untuk mengelola data pendaftar' },
          {
            name: 'PendaftarResource/Pages/',
            path: 'app/Filament/Resources/PendaftarResource/Pages',
            type: 'folder',
            children: [
              { name: 'ListPendaftars.php', path: 'app/Filament/Resources/PendaftarResource/Pages/ListPendaftars.php', type: 'file', description: 'Halaman daftar pendaftar dengan export CSV' },
              { name: 'CreatePendaftar.php', path: 'app/Filament/Resources/PendaftarResource/Pages/CreatePendaftar.php', type: 'file', description: 'Halaman tambah pendaftar manual' },
              { name: 'EditPendaftar.php', path: 'app/Filament/Resources/PendaftarResource/Pages/EditPendaftar.php', type: 'file', description: 'Halaman edit + quick actions approve/reject' },
            ]
          },
          {
            name: 'PendaftarResource/Widgets/',
            path: 'app/Filament/Resources/PendaftarResource/Widgets',
            type: 'folder',
            children: [
              { name: 'PendaftarStatsOverview.php', path: 'app/Filament/Resources/PendaftarResource/Widgets/PendaftarStatsOverview.php', type: 'file', description: 'Widget statistik overview pendaftar' },
            ]
          }
        ]
      },
      {
        name: 'Http/Controllers/',
        path: 'app/Http/Controllers',
        type: 'folder',
        children: [
          { name: 'PendaftarController.php', path: 'app/Http/Controllers/PendaftarController.php', type: 'file', description: 'Controller untuk landing page & proses form pendaftaran' },
        ]
      },
      {
        name: 'Models/',
        path: 'app/Models',
        type: 'folder',
        children: [
          { name: 'Pendaftar.php', path: 'app/Models/Pendaftar.php', type: 'file', description: 'Model Eloquent dengan scopes, accessors, dan helper methods' },
        ]
      },
    ]
  },
  {
    name: 'database/migrations/',
    path: 'database/migrations',
    type: 'folder',
    children: [
      { name: '2026_01_01_000001_create_pendaftars_table.php', path: 'database/migrations/2026_01_01_000001_create_pendaftars_table.php', type: 'file', description: 'Migration tabel pendaftars dengan semua kolom form' },
    ]
  },
  {
    name: 'resources/views/',
    path: 'resources/views',
    type: 'folder',
    children: [
      { name: 'layouts/app.blade.php', path: 'resources/views/layouts/app.blade.php', type: 'file', description: 'Layout utama dengan Vite, Tailwind, dan struktur HTML' },
      { name: 'welcome.blade.php', path: 'resources/views/welcome.blade.php', type: 'file', description: 'Halaman landing page yang meng-include semua komponen' },
      {
        name: 'components/',
        path: 'resources/views/components',
        type: 'folder',
        children: [
          { name: 'navbar.blade.php', path: 'resources/views/components/navbar.blade.php', type: 'file', description: 'Navbar responsif dengan mobile menu toggle' },
          { name: 'hero.blade.php', path: 'resources/views/components/hero.blade.php', type: 'file', description: 'Hero section dengan gradient background dan statistik' },
          { name: 'about.blade.php', path: 'resources/views/components/about.blade.php', type: 'file', description: 'Visi, Misi, Nilai, dan Keunggulan kampus' },
          { name: 'programs.blade.php', path: 'resources/views/components/programs.blade.php', type: 'file', description: 'Grid 8 program studi dengan ikon SVG' },
          { name: 'timeline.blade.php', path: 'resources/views/components/timeline.blade.php', type: 'file', description: 'Timeline alur pendaftaran 6 tahap' },
          { name: 'requirements.blade.php', path: 'resources/views/components/requirements.blade.php', type: 'file', description: 'Persyaratan dokumen & syarat umum' },
          { name: 'registration-form.blade.php', path: 'resources/views/components/registration-form.blade.php', type: 'file', description: 'Form pendaftaran dengan validasi Laravel' },
          { name: 'faq.blade.php', path: 'resources/views/components/faq.blade.php', type: 'file', description: 'FAQ accordion dengan JavaScript toggle' },
          { name: 'footer.blade.php', path: 'resources/views/components/footer.blade.php', type: 'file', description: 'Footer dengan kontak, sosmed, dan link navigasi' },
        ]
      }
    ]
  },
  {
    name: 'routes/',
    path: 'routes',
    type: 'folder',
    children: [
      { name: 'web.php', path: 'routes/web.php', type: 'file', description: 'Route landing page (GET /) dan submit form (POST /pendaftaran)' },
    ]
  },
];

function FileTreeItem({ node, depth = 0 }: { node: FileNode; depth?: number }) {
  const [isOpen, setIsOpen] = useState(depth < 2);

  if (node.type === 'folder') {
    return (
      <div>
        <button
          onClick={() => setIsOpen(!isOpen)}
          className="flex items-center gap-2 w-full text-left py-1.5 px-2 rounded-lg hover:bg-gray-100 transition-colors group"
          style={{ paddingLeft: `${depth * 16 + 8}px` }}
        >
          {isOpen ? (
            <ChevronDown className="w-4 h-4 text-gray-400 flex-shrink-0" />
          ) : (
            <ChevronRight className="w-4 h-4 text-gray-400 flex-shrink-0" />
          )}
          <FolderTree className="w-4 h-4 text-blue-500 flex-shrink-0" />
          <span className="text-sm font-medium text-gray-700">{node.name}</span>
        </button>
        {isOpen && node.children && (
          <div>
            {node.children.map((child, i) => (
              <FileTreeItem key={i} node={child} depth={depth + 1} />
            ))}
          </div>
        )}
      </div>
    );
  }

  return (
    <div
      className="flex items-center gap-2 py-1.5 px-2 rounded-lg hover:bg-gray-50 transition-colors"
      style={{ paddingLeft: `${depth * 16 + 28}px` }}
    >
      <FileCode className="w-4 h-4 text-emerald-500 flex-shrink-0" />
      <span className="text-sm text-gray-600 flex-1">{node.name}</span>
      {node.description && (
        <span className="text-xs text-gray-400 hidden lg:block max-w-xs truncate">{node.description}</span>
      )}
    </div>
  );
}

const features = [
  { icon: Layout, title: 'Landing Page Blade', desc: '9 komponen Blade views dengan Tailwind CSS via Vite' },
  { icon: Database, title: 'Migration & Model', desc: 'Tabel pendaftars dengan 15+ kolom dan Eloquent Model' },
  { icon: Shield, title: 'Filament Admin Panel', desc: 'Resource lengkap dengan CRUD, filter, search, dan export' },
  { icon: Table2, title: 'Tabel Pendaftar', desc: 'Kolom nama, email, HP, prodi, badge status, dan sorting' },
  { icon: FormInput, title: 'Form Pendaftaran', desc: 'Validasi server-side, old input, dan error messages' },
  { icon: Eye, title: 'Quick Actions', desc: 'Approve/Reject langsung dari tabel tanpa buka detail' },
  { icon: Server, title: 'Export CSV', desc: 'Export data pendaftar ke format CSV untuk laporan' },
  { icon: Code2, title: 'Stats Widget', desc: 'Overview statistik: total, pending, verified, rejected' },
];

export default function App() {
  const [copiedIndex, setCopiedIndex] = useState<number | null>(null);

  const codeSnippets = {
    migration: `Schema::create('pendaftars', function (Blueprint $table) {
    $table->id();
    $table->string('no_pendaftaran')->unique();
    $table->string('full_name');
    $table->string('email');
    $table->string('phone');
    $table->string('birth_place')->nullable();
    $table->date('birth_date')->nullable();
    $table->enum('gender', ['L', 'P']);
    $table->text('address')->nullable();
    $table->string('school')->nullable();
    $table->string('graduation_year')->nullable();
    $table->string('program');
    $table->string('parent_name')->nullable();
    $table->string('parent_phone')->nullable();
    $table->enum('status', ['pending', 'verified', 'rejected'])
          ->default('pending');
    $table->text('admin_notes')->nullable();
    $table->timestamp('verified_at')->nullable();
    $table->timestamps();
});`,
    route: `// routes/web.php
Route::get('/', [PendaftarController::class, 'index'])
    ->name('home');

Route::post('/pendaftaran', [PendaftarController::class, 'store'])
    ->name('pendaftaran.store');`,
    install: `# 1. Buat project Laravel
composer create-project laravel/laravel stt-pro-pmb
cd stt-pro-pmb

# 2. Install Filament
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels

# 3. Copy file-file dari laravel-project/

# 4. Migration & seed
php artisan migrate
php artisan make:filament-user

# 5. Build assets & run
npm install && npm run build
php artisan serve`,
  };

  const copyToClipboard = (text: string, index: number) => {
    navigator.clipboard.writeText(text);
    setCopiedIndex(index);
    setTimeout(() => setCopiedIndex(null), 2000);
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-gray-50 to-white">
      {/* Header */}
      <header className="bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 text-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
          <div className="flex items-center gap-3 mb-6">
            <div className="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20">
              <Code2 className="w-6 h-6 text-blue-300" />
            </div>
            <div>
              <h1 className="text-2xl font-bold">STT Pro - Sistem PMB</h1>
              <p className="text-blue-200 text-sm">Laravel Blade + Filament Admin Panel</p>
            </div>
          </div>
          <p className="text-lg text-blue-100/80 max-w-3xl mb-8">
            Dokumentasi lengkap konversi project React TSX ke Laravel Blade dengan Filament admin panel. 
            Semua file telah disiapkan dan siap digunakan.
          </p>
          <div className="flex flex-wrap gap-3">
            <span className="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm text-blue-100">Laravel 11</span>
            <span className="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm text-blue-100">Filament 3.2</span>
            <span className="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm text-blue-100">Tailwind CSS 4</span>
            <span className="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm text-blue-100">Vite</span>
            <span className="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm text-blue-100">PHP 8.2+</span>
          </div>
        </div>
      </header>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {/* Features Grid */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Fitur yang Disiapkan</h2>
          <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {features.map((feature, i) => (
              <div key={i} className="bg-white rounded-xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                <feature.icon className="w-8 h-8 text-blue-600 mb-3" />
                <h3 className="font-semibold text-gray-900 mb-1">{feature.title}</h3>
                <p className="text-sm text-gray-600">{feature.desc}</p>
              </div>
            ))}
          </div>
        </section>

        {/* Project Structure */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Struktur Folder Project</h2>
          <div className="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div className="bg-gray-50 border-b border-gray-200 px-4 py-3 flex items-center gap-2">
              <FolderTree className="w-5 h-5 text-gray-500" />
              <span className="font-medium text-gray-700">laravel-project/</span>
            </div>
            <div className="p-4 max-h-[600px] overflow-y-auto">
              {projectStructure.map((node, i) => (
                <FileTreeItem key={i} node={node} />
              ))}
            </div>
          </div>
        </section>

        {/* Installation */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Cara Instalasi</h2>
          <div className="bg-gray-900 rounded-2xl overflow-hidden">
            <div className="flex items-center justify-between px-4 py-3 bg-gray-800 border-b border-gray-700">
              <div className="flex items-center gap-2">
                <div className="flex gap-1.5">
                  <div className="w-3 h-3 rounded-full bg-red-500"></div>
                  <div className="w-3 h-3 rounded-full bg-yellow-500"></div>
                  <div className="w-3 h-3 rounded-full bg-green-500"></div>
                </div>
                <span className="text-gray-400 text-sm ml-2">Terminal</span>
              </div>
              <button
                onClick={() => copyToClipboard(codeSnippets.install, 0)}
                className="flex items-center gap-1 text-gray-400 hover:text-white text-sm transition-colors"
              >
                {copiedIndex === 0 ? <Check className="w-4 h-4 text-green-400" /> : <Copy className="w-4 h-4" />}
                {copiedIndex === 0 ? 'Copied!' : 'Copy'}
              </button>
            </div>
            <pre className="p-6 text-sm text-green-400 overflow-x-auto">
              <code>{codeSnippets.install}</code>
            </pre>
          </div>
        </section>

        {/* Code Examples */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Contoh Kode</h2>
          <div className="grid lg:grid-cols-2 gap-6">
            {/* Migration */}
            <div className="bg-gray-900 rounded-2xl overflow-hidden">
              <div className="flex items-center justify-between px-4 py-3 bg-gray-800 border-b border-gray-700">
                <div className="flex items-center gap-2">
                  <Database className="w-4 h-4 text-blue-400" />
                  <span className="text-gray-300 text-sm">Migration - pendaftars table</span>
                </div>
                <button
                  onClick={() => copyToClipboard(codeSnippets.migration, 1)}
                  className="flex items-center gap-1 text-gray-400 hover:text-white text-sm transition-colors"
                >
                  {copiedIndex === 1 ? <Check className="w-4 h-4 text-green-400" /> : <Copy className="w-4 h-4" />}
                </button>
              </div>
              <pre className="p-4 text-xs text-gray-300 overflow-x-auto max-h-80">
                <code>{codeSnippets.migration}</code>
              </pre>
            </div>

            {/* Routes */}
            <div className="bg-gray-900 rounded-2xl overflow-hidden">
              <div className="flex items-center justify-between px-4 py-3 bg-gray-800 border-b border-gray-700">
                <div className="flex items-center gap-2">
                  <Server className="w-4 h-4 text-purple-400" />
                  <span className="text-gray-300 text-sm">Routes - web.php</span>
                </div>
                <button
                  onClick={() => copyToClipboard(codeSnippets.route, 2)}
                  className="flex items-center gap-1 text-gray-400 hover:text-white text-sm transition-colors"
                >
                  {copiedIndex === 2 ? <Check className="w-4 h-4 text-green-400" /> : <Copy className="w-4 h-4" />}
                </button>
              </div>
              <pre className="p-4 text-xs text-gray-300 overflow-x-auto max-h-80">
                <code>{codeSnippets.route}</code>
              </pre>
            </div>
          </div>
        </section>

        {/* Filament Features */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Fitur Admin Panel (Filament)</h2>
          <div className="grid md:grid-cols-2 gap-6">
            <div className="bg-white rounded-2xl border border-gray-200 p-6">
              <h3 className="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <Table2 className="w-5 h-5 text-blue-600" />
                Tabel Pendaftar
              </h3>
              <ul className="space-y-2 text-sm text-gray-600">
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Kolom: No. Daftar, Nama, Email, HP, Prodi, Status</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Badge status berwarna (pending/verified/rejected)</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Pencarian global (searchable columns)</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Filter: status, program studi, jenis kelamin, tanggal</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Sorting pada semua kolom utama</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Auto-refresh setiap 30 detik</li>
              </ul>
            </div>

            <div className="bg-white rounded-2xl border border-gray-200 p-6">
              <h3 className="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <Shield className="w-5 h-5 text-purple-600" />
                Aksi & Fitur
              </h3>
              <ul className="space-y-2 text-sm text-gray-600">
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Quick Approve/Reject dari tabel</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Bulk actions (setujui/tolak/hapus terpilih)</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Export data ke CSV</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Stats widget: total, pending, verified, rejected</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Form edit dengan catatan admin</li>
                <li className="flex items-center gap-2"><Check className="w-4 h-4 text-green-500" /> Reset status ke pending</li>
              </ul>
            </div>
          </div>
        </section>

        {/* Database Schema */}
        <section className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 mb-8">Database Schema</h2>
          <div className="bg-white rounded-2xl border border-gray-200 overflow-hidden">
            <div className="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
              <h3 className="font-bold text-gray-900 flex items-center gap-2">
                <Database className="w-5 h-5 text-blue-600" />
                Tabel: pendaftars
              </h3>
            </div>
            <div className="overflow-x-auto">
              <table className="w-full text-sm">
                <thead className="bg-gray-50 border-b border-gray-200">
                  <tr>
                    <th className="text-left px-4 py-3 font-semibold text-gray-700">Kolom</th>
                    <th className="text-left px-4 py-3 font-semibold text-gray-700">Tipe</th>
                    <th className="text-left px-4 py-3 font-semibold text-gray-700">Nullable</th>
                    <th className="text-left px-4 py-3 font-semibold text-gray-700">Default</th>
                    <th className="text-left px-4 py-3 font-semibold text-gray-700">Keterangan</th>
                  </tr>
                </thead>
                <tbody className="divide-y divide-gray-100">
                  {[
                    ['id', 'bigint', 'No', '-', 'Primary key auto increment'],
                    ['no_pendaftaran', 'string', 'No', '-', 'Unique, format: STT-YYYY-XXXX'],
                    ['full_name', 'string', 'No', '-', 'Nama lengkap pendaftar'],
                    ['email', 'string', 'No', '-', 'Email aktif pendaftar'],
                    ['phone', 'string', 'No', '-', 'Nomor telepon/HP'],
                    ['birth_place', 'string', 'Yes', 'NULL', 'Tempat lahir'],
                    ['birth_date', 'date', 'Yes', 'NULL', 'Tanggal lahir'],
                    ['gender', 'enum(L,P)', 'No', '-', 'Jenis kelamin'],
                    ['address', 'text', 'Yes', 'NULL', 'Alamat lengkap'],
                    ['school', 'string', 'Yes', 'NULL', 'Asal sekolah'],
                    ['graduation_year', 'string', 'Yes', 'NULL', 'Tahun lulus'],
                    ['program', 'string', 'No', '-', 'Program studi pilihan'],
                    ['parent_name', 'string', 'Yes', 'NULL', 'Nama orang tua/wali'],
                    ['parent_phone', 'string', 'Yes', 'NULL', 'No. HP orang tua'],
                    ['status', 'enum', 'No', 'pending', 'pending | verified | rejected'],
                    ['admin_notes', 'text', 'Yes', 'NULL', 'Catatan internal admin'],
                    ['verified_at', 'timestamp', 'Yes', 'NULL', 'Waktu verifikasi'],
                    ['created_at', 'timestamp', 'No', '-', 'Waktu pendaftaran'],
                    ['updated_at', 'timestamp', 'No', '-', 'Waktu terakhir update'],
                  ].map((row, i) => (
                    <tr key={i} className="hover:bg-gray-50">
                      <td className="px-4 py-2 font-mono text-xs text-blue-700">{row[0]}</td>
                      <td className="px-4 py-2 font-mono text-xs text-gray-600">{row[1]}</td>
                      <td className="px-4 py-2">
                        {row[2] === 'No' ? (
                          <span className="px-2 py-0.5 bg-red-50 text-red-700 text-xs rounded-full">NOT NULL</span>
                        ) : (
                          <span className="px-2 py-0.5 bg-gray-50 text-gray-500 text-xs rounded-full">NULL</span>
                        )}
                      </td>
                      <td className="px-4 py-2 font-mono text-xs text-gray-500">{row[3]}</td>
                      <td className="px-4 py-2 text-xs text-gray-600">{row[4]}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </section>

        {/* Footer */}
        <footer className="text-center py-8 border-t border-gray-200">
          <p className="text-gray-500 text-sm">
            © 2026 STT Pro - Sistem PMB. Semua file Laravel telah tersedia di folder <code className="bg-gray-100 px-2 py-0.5 rounded text-blue-600">laravel-project/</code>
          </p>
        </footer>
      </div>
    </div>
  );
}
