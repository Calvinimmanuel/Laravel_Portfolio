<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Portfolio</title>
    
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
                <a href="/" class="text-3xl font-serif font-bold text-white">PORTFOLIO</a>
                <a href="/" class="text-white hover:text-gray-300 transition-colors">← Back to Home</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Section -->
    <section class="pt-32 pb-20 px-6 min-h-screen" style="padding-top: 8rem; background-color: #000000;">
        <div class="container mx-auto max-w-6xl">
            <h1 class="text-5xl md:text-6xl font-bold text-center mb-16 text-white" data-aos="fade-up">Portfolio</h1>
            
            <!-- Category Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8" data-aos="fade-up" data-aos-delay="100">
                <!-- Foto -->
                <a href="/portfolio/foto" class="group">
                    <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-8 text-center hover:border-white transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white group-hover:text-blue-400 transition-colors">Foto</h3>
                    </div>
                </a>

                <!-- Video -->
                <a href="/portfolio/video" class="group">
                    <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-8 text-center hover:border-white transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white group-hover:text-red-400 transition-colors">Video</h3>
                    </div>
                </a>

                <!-- Desain -->
                <a href="/portfolio/desain" class="group">
                    <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-8 text-center hover:border-white transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white group-hover:text-green-400 transition-colors">Desain</h3>
                    </div>
                </a>

                <!-- Coding -->
                <a href="/portfolio/coding" class="group">
                    <div class="bg-gray-900/50 border border-gray-800 rounded-lg p-8 text-center hover:border-white transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white group-hover:text-yellow-400 transition-colors">Coding</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <style>
        body {
            background-color: #000000 !important;
            color: #ffffff !important;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        
        #navbar {
            background-color: rgba(0, 0, 0, 0.9) !important;
            backdrop-filter: blur(10px);
        }
        
        html {
            scroll-behavior: smooth;
        }
    </style>
</body>
</html>

