<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ str_replace('_', ' ', $folder) }} - Gallery</title>
    
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
                <div class="flex items-center space-x-4">
                    <a href="/portfolio/{{ $category }}" class="text-white hover:text-gray-300 transition-colors">← Back</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Gallery Section -->
    <section class="pt-32 pb-20 px-6 min-h-screen" style="padding-top: 8rem; background-color: #000000;">
        <div class="container mx-auto max-w-7xl">
            <h1 class="text-4xl md:text-5xl font-bold text-center mb-12 text-white capitalize" data-aos="fade-up">
                {{ str_replace('_', ' ', $folder) }}
            </h1>
            
            @if(empty($images))
                <div class="text-center py-20" data-aos="fade-up">
                    <p class="text-gray-400 text-xl">Tidak ada foto dalam folder ini</p>
                </div>
            @else
                <!-- Image Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6" data-aos="fade-up" data-aos-delay="100">
                    @foreach($images as $image)
                        <div class="group cursor-pointer" onclick="openLightbox('{{ asset('images/web/' . $folder . '/' . $image) }}')">
                            <div class="bg-gray-900/50 border border-gray-800 rounded-lg overflow-hidden hover:border-white transition-all duration-300 hover:scale-105">
                                <div class="aspect-square overflow-hidden bg-gray-800">
                                    <img src="{{ asset('images/web/' . $folder . '/' . $image) }}" 
                                         alt="{{ $image }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-gray-300 text-4xl z-10">
            ×
        </button>
        <button onclick="prevImage()" class="absolute left-4 text-white hover:text-gray-300 text-4xl z-10">
            ‹
        </button>
        <button onclick="nextImage()" class="absolute right-4 text-white hover:text-gray-300 text-4xl z-10">
            ›
        </button>
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-full object-contain">
    </div>

    <script>
        let currentImages = @json($images);
        let currentFolder = '{{ $folder }}';
        let currentIndex = 0;

        function openLightbox(imageSrc) {
            currentIndex = currentImages.findIndex(img => imageSrc.includes(img));
            if (currentIndex === -1) currentIndex = 0;
            updateLightbox();
            document.getElementById('lightbox').classList.remove('hidden');
            document.getElementById('lightbox').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function updateLightbox() {
            const img = document.getElementById('lightbox-img');
            img.src = `/images/web/${currentFolder}/${currentImages[currentIndex]}`;
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % currentImages.length;
            updateLightbox();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
            updateLightbox();
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (!lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowRight') nextImage();
                if (e.key === 'ArrowLeft') prevImage();
            }
        });
    </script>

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

