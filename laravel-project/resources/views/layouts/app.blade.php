<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="STT Pro - Sistem Penerimaan Mahasiswa Baru 2026/2027. Daftar sekarang dan wujudkan masa depan cerahmu!">
    <title>STT Pro - Sistem PMB (Penerimaan Mahasiswa Baru) 2026/2027</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out; }
    </style>
</head>
<body class="min-h-screen bg-white antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        {{ $slot ?? '' }}
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Scripts --}}
    @stack('scripts')
</body>
</html>
