<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PORTFOLIO - Calvin Immanuel Geraldy Kaguansage</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&family=playfair+display:400,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white antialiased" style="background-color: #000000; color: #ffffff;">
    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-black/80 backdrop-blur-md border-b border-gray-900">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="#" class="text-3xl font-serif font-bold text-white">
                    PORTFOLIO
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="nav-link text-white hover:text-gray-300 transition-colors">Home</a>
                    <a href="/dashboard" class="nav-link text-white hover:text-gray-300 transition-colors">Portfolio</a>
                    <a href="#pengalaman" class="nav-link text-white hover:text-gray-300 transition-colors">Background</a>
                    <a href="#contact" class="nav-link text-white hover:text-gray-300 transition-colors">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white" id="mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="profil" class="pt-32 pb-20 px-6 min-h-screen" style="padding-top: 8rem; padding-bottom: 5rem; min-height: 100vh; background-color: #000000;">
        <div class="container mx-auto max-w-7xl">
            <!-- Title -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 text-white">PORTFOLIO</h1>
                <h2 class="text-3xl md:text-4xl font-medium text-gray-300">Calvin Immanuel Geraldy Kaguansage</h2>
            </div>

            <!-- Profile Section - Foto Diri -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                <!-- Photo 1 -->
                <div class="border border-gray-800 rounded-lg p-3 bg-gray-900/50 flex items-center justify-center overflow-hidden aspect-[3/4] max-h-[400px]">
                    <img src="{{ asset('images/web/fotoDiri/PI.jpg') }}" alt="Foto Diri 1"
                         class="w-full h-full rounded-lg object-cover"
                         onerror="this.src='{{ asset('images/web/fotoDiri/PI-2.jpg') }}'">
                </div>

                <!-- Photo 2 -->
                <div class="border border-gray-800 rounded-lg p-3 bg-gray-900/50 flex items-center justify-center overflow-hidden aspect-[3/4] max-h-[400px]">
                    <img src="{{ asset('images/web/fotoDiri/PI-2.jpg') }}" alt="Foto Diri 2"
                         class="w-full h-full rounded-lg object-cover"
                         onerror="this.src='{{ asset('images/web/fotoDiri/PI-3.jpg') }}'">
                </div>

                <!-- Photo 3 -->
                <div class="border border-gray-800 rounded-lg p-3 bg-gray-900/50 flex items-center justify-center overflow-hidden aspect-[3/4] max-h-[400px]">
                    <img src="{{ asset('images/web/fotoDiri/PI-3.jpg') }}" alt="Foto Diri 3"
                         class="w-full h-full rounded-lg object-cover"
                         onerror="this.src='{{ asset('images/web/fotoDiri/PI.jpg') }}'">
                </div>
            </div>

            <!-- Contact Info -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="inline-block bg-gray-900/50 border border-gray-800 rounded-lg p-8">
                    <p class="text-lg mb-3">
                        <strong class="text-white">Spesialisasi:</strong> <span class="text-gray-300">Full-Stack Development & Multimedia</span>
                    </p>
                    <p class="text-lg mb-3">
                        <strong class="text-white">Lokasi:</strong> <span class="text-gray-300">Yogyakarta</span>
                    </p>
                    <p class="text-lg mb-3">
                        <strong class="text-white">Kontak:</strong><br>
                        <a href="mailto:calvinkaguansage12@gmail.com" class="text-blue-400 hover:text-blue-300 transition-colors">
                            Calvinkaguansage12@gmail.com
                        </a><br>
                        <a href="tel:+6281256532515" class="text-blue-400 hover:text-blue-300 transition-colors">
                            +62 812-5653-2515
                        </a>
                    </p>
                    <p class="text-lg">
                        <strong class="text-white">Instagram:</strong><br>
                        <a href="https://www.instagram.com/_clei._/" target="_blank" class="text-blue-400 hover:text-blue-300 transition-colors">
                            _clei._
                        </a>
                    </p>
                </div>
            </div>

            <!-- Skills -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="flex flex-wrap justify-center gap-8 text-2xl md:text-3xl">
                    <div class="text-gray-300">• Full-Stack Development</div>
                    <div class="text-gray-300">• UI/UX Design</div>
                    <div class="text-gray-300">• Fotografi</div>
                    <div class="text-gray-300">• Videografi</div>
                    <div class="text-gray-300">• Desain Grafis</div>
                </div>
            </div>

            <!-- About Section - Redesigned -->
            <div class="max-w-6xl mx-auto" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-5xl md:text-6xl font-bold text-center mb-4 text-white">
                    Tentang <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Saya</span>
                </h3>
                <p class="text-center text-gray-400 mb-16 text-lg">Menggabungkan teknologi dan kreativitas</p>

                <!-- Story Cards -->
                <div class="space-y-8">
                    <!-- Card 1: Introduction -->
                    <div class="story-card group relative overflow-hidden bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-2xl p-8 md:p-10 hover:border-blue-500/50 transition-all duration-500" data-aos="fade-right">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-500/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-bold mb-4 text-white group-hover:text-blue-400 transition-colors">Mahasiswa Informatika dengan Passion Kreatif</h4>
                                    <p class="text-gray-300 leading-relaxed text-lg">
                                        Saya adalah <span class="text-white font-semibold">mahasiswa Informatika Universitas Sanata Dharma</span> dengan ketertarikan mendalam pada pengembangan aplikasi, fotografi, desain, dan multimedia. Saya percaya bahwa teknologi dan kreativitas dapat bersinergi untuk menciptakan solusi yang tidak hanya fungsional, tetapi juga memiliki nilai estetika yang tinggi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Programming Skills -->
                    <div class="story-card group relative overflow-hidden bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-2xl p-8 md:p-10 hover:border-green-500/50 transition-all duration-500" data-aos="fade-left" data-aos-delay="100">
                        <div class="absolute top-0 left-0 w-64 h-64 bg-green-500/10 rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2 group-hover:bg-green-500/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-bold mb-4 text-white group-hover:text-green-400 transition-colors">Pengembangan Aplikasi Full-Stack</h4>
                                    <p class="text-gray-300 leading-relaxed text-lg">
                                        Dalam bidang pemrograman, saya memiliki pengalaman membuat <span class="text-green-400 font-semibold">aplikasi full-stack menggunakan Laravel</span>, serta menggunakan <span class="text-teal-400 font-semibold">Dart</span> dalam pengembangan aplikasi. Saya juga memiliki kemampuan dasar dalam <span class="text-white font-medium">perancangan UI/UX</span>, dengan fokus pada tampilan yang sederhana, fungsional, dan cukup nyaman serta disenangi oleh pengguna.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Visual & Multimedia Skills -->
                    <div class="story-card group relative overflow-hidden bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-2xl p-8 md:p-10 hover:border-pink-500/50 transition-all duration-500" data-aos="fade-right" data-aos-delay="200">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-pink-500/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-bold mb-4 text-white group-hover:text-pink-400 transition-colors">Desain Grafis & Multimedia</h4>
                                    <p class="text-gray-300 leading-relaxed text-lg">
                                        Di bidang visual, saya menguasai <span class="text-pink-400 font-semibold">Adobe Illustrator</span>, <span class="text-rose-400 font-semibold">Adobe Photoshop</span>, dan <span class="text-white font-medium">DaVinci Resolve</span> untuk kebutuhan desain grafis, pengolahan foto, dan video. Keterampilan ini memungkinkan saya untuk menciptakan konten visual yang menarik dan profesional, baik untuk keperluan digital maupun cetak.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Event Documentation -->
                    <div class="story-card group relative overflow-hidden bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-2xl p-8 md:p-10 hover:border-yellow-500/50 transition-all duration-500" data-aos="fade-left" data-aos-delay="300">
                        <div class="absolute top-0 left-0 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2 group-hover:bg-yellow-500/20 transition-all duration-500"></div>
                        <div class="relative z-10">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-bold mb-4 text-white group-hover:text-yellow-400 transition-colors">Dokumentasi Event Kampus</h4>
                                    <p class="text-gray-300 leading-relaxed text-lg">
                                        Saya aktif mendokumentasikan berbagai <span class="text-yellow-400 font-semibold">event kampus</span>, baik di tingkat fakultas maupun universitas, seperti kegiatan organisasi, seminar, konferensi, festival mahasiswa, kompetisi, dan acara sosial. Pengalaman ini melatih saya untuk bekerja di lingkungan yang dinamis serta peka dalam menangkap <span class="text-orange-400 font-semibold">momen dan atmosfer</span> setiap acara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5: Current Role -->
                    <div class="story-card group relative overflow-hidden bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-2xl p-8 md:p-10 hover:border-purple-500/50 transition-all duration-500" data-aos="fade-up" data-aos-delay="400">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10 text-center">
                            <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-3xl font-bold mb-6 text-white group-hover:text-purple-400 transition-colors">Student Staff Humas Universitas Sanata Dharma</h4>
                            <p class="text-gray-300 leading-relaxed text-xl max-w-3xl mx-auto">
                                Saat ini, saya dipercaya sebagai <span class="text-white font-semibold">Student Staff Humas Universitas Sanata Dharma</span> dengan peran <span class="text-purple-400 font-bold">editor dan multimedia</span>, di mana saya terlibat dalam produksi dan pengelolaan konten visual untuk mendukung <span class="text-blue-400 font-bold">komunikasi serta citra institusi</span>. Peran ini memberikan saya kesempatan untuk mengaplikasikan keterampilan teknis dan kreatif dalam konteks profesional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="pengalaman" class="py-20 px-6 bg-black" style="background-color: #000000;">
        <div class="container mx-auto max-w-7xl">
            <h3 class="text-4xl font-bold text-center mb-12 text-white" data-aos="fade-up">Pengalaman Event</h3>

            <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="100">
                <table class="w-full border-collapse bg-gray-900/50 border border-gray-800 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-800">
                            <th class="border border-gray-700 px-6 py-4 text-left text-white font-semibold">Pengalaman</th>
                            <th class="border border-gray-700 px-6 py-4 text-left text-white font-semibold">Tahun</th>
                            <th class="border border-gray-700 px-6 py-4 text-left text-white font-semibold">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Porsi</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">2024</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Menjadi Panitia dari acara Pekan olahraga dan seni untuk mendokumentasikan, mulai dari awal setiap perlombaan hingga selesai.</td>
                        </tr>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">GameLoft</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">2024</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Menjadi Panitia dari acara kunjungan Perusahaan dimana perusahaan GameLoft untuk mendokumentasikan, mulai dari awal perkunjungan hingga selesai.</td>
                        </tr>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Lens Club</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">2024</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Menjadi Pengurus dari UKM fotografer, dimana saya mengikuti setiap Proker ukm, seperti pameran, hunting foto bersama sama dan banyak lagi yang berbau fotografi.</td>
                        </tr>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Insadha</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">2024</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Menjadi Panitia dari acara ospek kampus untuk mendokumentasikan, mulai dari awalnya ospek hingga selesai.</td>
                        </tr>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">IT Days</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">2024</td>
                            <td class="border border-gray-700 px-6 py-4 text-gray-300">Dokumentasi foto dari acara Seminar, yang mana salah satu bintang tamu seorang youtuber bernama eno bening, mulai dari awal seminar hingga selesai seminar.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-6 bg-gray-950" style="background-color: #0a0a0a;">
        <div class="container mx-auto max-w-4xl">
            <h3 class="text-4xl font-bold text-center mb-12 text-white" data-aos="fade-up">Contact</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-6">
                    <h4 class="text-xl font-semibold mb-4 text-white">Email</h4>
                    <a href="mailto:calvinkaguansage12@gmail.com" class="text-blue-400 hover:text-blue-300 transition-colors">
                        Calvinkaguansage12@gmail.com
                    </a>
                </div>
                <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-6">
                    <h4 class="text-xl font-semibold mb-4 text-white">Phone</h4>
                    <a href="tel:+6281256532515" class="text-blue-400 hover:text-blue-300 transition-colors">
                        +62 812-5653-2515
                    </a>
                </div>
                <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-6">
                    <h4 class="text-xl font-semibold mb-4 text-white">Instagram</h4>
                    <a href="https://www.instagram.com/_clei._/" target="_blank" class="text-blue-400 hover:text-blue-300 transition-colors">
                        @_clei._
                    </a>
                </div>
                <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-6">
                    <h4 class="text-xl font-semibold mb-4 text-white">Lokasi</h4>
                    <p class="text-gray-300">Yogyakarta</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 px-6 bg-black border-t border-gray-900 text-center">
        <p class="text-gray-400">© 2025 Calvin Immanuel Geraldy Kaguansage</p>
    </footer>

    <style>
        /* Grid Pattern Background */
        body {
            background-color: #000000 !important;
            color: #ffffff !important;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Ensure all sections are visible */
        section {
            background-color: #000000 !important;
        }

        /* Navigation styles */
        #navbar {
            background-color: rgba(0, 0, 0, 0.9) !important;
            backdrop-filter: blur(10px);
        }

        #navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.95) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #000;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Story Cards Animations */
        .story-card {
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .story-card[data-aos].aos-animate {
            transform: translateY(0);
            opacity: 1;
        }

        .story-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        /* Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .story-card .flex-shrink-0 {
            animation: float 3s ease-in-out infinite;
        }

        .story-card:nth-child(2) .flex-shrink-0 {
            animation-delay: 0.5s;
        }

        .story-card:nth-child(3) .flex-shrink-0 {
            animation-delay: 1s;
        }

        .story-card:nth-child(4) .flex-shrink-0 {
            animation-delay: 1.5s;
        }

        /* Text Gradient Animation */
        @keyframes gradient-shift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .bg-clip-text {
            background-size: 200% auto;
            animation: gradient-shift 3s ease infinite;
        }
    </style>
</body>
</html>
