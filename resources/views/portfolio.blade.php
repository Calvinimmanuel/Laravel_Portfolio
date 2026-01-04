<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst($category) }} - Portfolio</title>
    
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
                    <a href="/dashboard" class="text-white hover:text-gray-300 transition-colors">← Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Portfolio Section -->
    <section class="pt-32 pb-20 px-6 min-h-screen" style="padding-top: 8rem; background-color: #000000;">
        <div class="container mx-auto max-w-7xl">
            <h1 class="text-5xl md:text-6xl font-bold text-center mb-16 text-white capitalize" data-aos="fade-up">
                {{ $category }}
            </h1>
            
            @if(empty($folders))
                @if($category === 'coding')
                    <!-- GitHub Portfolio Section -->
                    <div class="max-w-5xl mx-auto" data-aos="fade-up">
                        <!-- GitHub Profile Card -->
                        <div class="bg-gradient-to-br from-gray-900/80 to-gray-800/50 border border-gray-700 rounded-xl p-6 mb-6 hover:border-blue-500/50 transition-all duration-500">
                            <div class="flex items-center gap-4 mb-4">
                                <div id="github-avatar" class="w-16 h-16 rounded-full bg-gray-800 flex items-center justify-center overflow-hidden">
                                    <svg class="w-10 h-10 text-gray-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h2 id="github-name" class="text-xl font-bold text-white">Calvinimmanuel</h2>
                                    <p id="github-bio" class="text-gray-400 text-sm">Loading...</p>
                                </div>
                                <a href="https://github.com/Calvinimmanuel" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold px-4 py-2 rounded-lg transition-all duration-300 text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                    </svg>
                                    View Profile
                                </a>
                            </div>
                            <div class="flex gap-6 text-sm">
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span id="github-followers">-</span> followers
                                </div>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <span id="github-following">-</span> following
                                </div>
                                <div class="flex items-center gap-2 text-gray-400">
                                    <span id="github-repos-count">-</span> repositories
                                </div>
                            </div>
                        </div>

                        <!-- Repositories Grid -->
                        <div id="github-repos" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-full text-center py-8">
                                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                                <p class="text-gray-400 mt-2">Loading repositories...</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20" data-aos="fade-up">
                        <p class="text-gray-400 text-xl">Portfolio {{ ucfirst($category) }} akan segera hadir</p>
                    </div>
                @endif
            @else
                <!-- Folder Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8" data-aos="fade-up" data-aos-delay="100">
                    @foreach($folders as $folderName => $images)
                        <a href="/portfolio/{{ $category }}/{{ str_replace(' ', '-', $folderName) }}" class="group">
                            <div class="bg-gray-900/50 border border-gray-800 rounded-lg overflow-hidden hover:border-white transition-all duration-300 hover:scale-105">
                                <!-- Thumbnail -->
                                <div class="aspect-video overflow-hidden bg-gray-800">
                                    <img src="{{ asset('images/web/' . $folderName . '/' . ($images[0] ?? '')) }}" 
                                         alt="{{ $folderName }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                         onerror="this.src='https://via.placeholder.com/800x450/1a1a1a/ffffff?text={{ urlencode($folderName) }}'">
                                </div>
                                <!-- Folder Info -->
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-blue-400 transition-colors">
                                        {{ str_replace('_', ' ', $folderName) }}
                                    </h3>
                                    <p class="text-gray-400 text-sm">{{ count($images) }} foto</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
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

    @if($category === 'coding')
    <script>
        const GITHUB_USERNAME = 'Calvinimmanuel';
        const GITHUB_API = 'https://api.github.com';

        // Fetch GitHub user data
        async function fetchGitHubData() {
            try {
                // Fetch user info
                const userResponse = await fetch(`${GITHUB_API}/users/${GITHUB_USERNAME}`);
                const userData = await userResponse.json();

                if (userResponse.ok) {
                    // Update profile card
                    const avatarEl = document.getElementById('github-avatar');
                    if (userData.avatar_url) {
                        avatarEl.innerHTML = `<img src="${userData.avatar_url}" alt="${userData.login}" class="w-full h-full object-cover">`;
                    }

                    document.getElementById('github-name').textContent = userData.name || userData.login;
                    document.getElementById('github-bio').textContent = userData.bio || 'No bio available';
                    document.getElementById('github-followers').textContent = userData.followers || 0;
                    document.getElementById('github-following').textContent = userData.following || 0;
                    document.getElementById('github-repos-count').textContent = userData.public_repos || 0;
                }

                // Fetch repositories
                const reposResponse = await fetch(`${GITHUB_API}/users/${GITHUB_USERNAME}/repos?sort=updated&per_page=6`);
                const reposData = await reposResponse.json();

                if (reposResponse.ok) {
                    displayRepositories(reposData);
                }
            } catch (error) {
                console.error('Error fetching GitHub data:', error);
                document.getElementById('github-repos').innerHTML = `
                    <div class="col-span-full text-center py-8">
                        <p class="text-red-400">Error loading repositories. Please try again later.</p>
                    </div>
                `;
            }
        }

        function displayRepositories(repos) {
            const reposContainer = document.getElementById('github-repos');
            
            if (repos.length === 0) {
                reposContainer.innerHTML = `
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-400">No repositories found.</p>
                    </div>
                `;
                return;
            }

            reposContainer.innerHTML = repos.map(repo => {
                const language = repo.language || 'Unknown';
                const languageColors = {
                    'JavaScript': '#f7df1e',
                    'TypeScript': '#3178c6',
                    'PHP': '#777bb4',
                    'Python': '#3776ab',
                    'Java': '#ed8b00',
                    'Dart': '#0175c2',
                    'HTML': '#e34c26',
                    'CSS': '#1572b6',
                    'Vue': '#4fc08d',
                    'React': '#61dafb',
                    'Laravel': '#ff2d20',
                };

                const languageColor = languageColors[language] || '#8b5cf6';

                return `
                    <a href="${repo.html_url}" target="_blank" rel="noopener noreferrer" 
                       class="bg-gray-900/50 border border-gray-800 rounded-lg p-4 hover:border-blue-500/50 transition-all duration-300 hover:scale-[1.02] group">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-white font-semibold group-hover:text-blue-400 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0v12h16V6H4z" clip-rule="evenodd"/>
                                </svg>
                                ${repo.name}
                            </h3>
                            ${repo.private ? '<span class="text-xs text-gray-500 border border-gray-700 px-2 py-0.5 rounded">Private</span>' : ''}
                        </div>
                        <p class="text-gray-400 text-sm mb-3 line-clamp-2">${repo.description || 'No description available'}</p>
                        <div class="flex items-center gap-4 text-xs text-gray-500">
                            ${repo.language ? `
                                <div class="flex items-center gap-1">
                                    <span class="w-3 h-3 rounded-full" style="background-color: ${languageColor}"></span>
                                    ${language}
                                </div>
                            ` : ''}
                            ${repo.stargazers_count > 0 ? `
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    ${repo.stargazers_count}
                                </div>
                            ` : ''}
                            ${repo.forks_count > 0 ? `
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    ${repo.forks_count}
                                </div>
                            ` : ''}
                            <span class="ml-auto">Updated ${formatDate(repo.updated_at)}</span>
                        </div>
                    </a>
                `;
            }).join('');
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffTime = Math.abs(now - date);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays === 0) return 'today';
            if (diffDays === 1) return 'yesterday';
            if (diffDays < 7) return `${diffDays} days ago`;
            if (diffDays < 30) return `${Math.floor(diffDays / 7)} weeks ago`;
            if (diffDays < 365) return `${Math.floor(diffDays / 30)} months ago`;
            return `${Math.floor(diffDays / 365)} years ago`;
        }

        // Load data when page is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fetchGitHubData);
        } else {
            fetchGitHubData();
        }
    </script>
    @endif
</body>
</html>

