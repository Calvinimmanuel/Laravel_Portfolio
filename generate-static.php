<?php

/**
 * Script untuk generate static HTML dari Laravel Blade templates
 * Untuk deployment ke GitHub Pages
 * 
 * Usage: php generate-static.php
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Set base URL untuk GitHub Pages (sesuaikan dengan repository name)
$baseUrl = '/website_Portfolio'; 
$outputDir = __DIR__.'/docs';

// Clean output directory
if (is_dir($outputDir)) {
    deleteDirectory($outputDir);
}
mkdir($outputDir, 0755, true);

// Data untuk views
$folders = [
    'foto' => [
        'DayakNite' => ['1 (1).jpg', '1 (18).jpg', '1 (19).jpg', '1 (20).jpg', '1 (21).jpg', '1 (22).jpg', '1 (23).jpg', '1 (24).jpg'],
        'Dfest' => ['1 (9).jpg', '1 (10).jpg', '1 (11).jpg', '1 (12).jpg', '1 (13).jpg', '1 (14).jpg'],
        'eco' => ['CVNxHMS.jpg', 'CVNxHMS-4.jpg', 'CVNxHMS-9.jpg', 'CVNxHMS-11.jpg', 'CVNxHMS-12.jpg', 'CVNxHMS-13.jpg', 'CVNxHMS-14.jpg', 'CVNxHMS-15.jpg', 'CVNxHMS-19.jpg', 'CVNxHMS-23.jpg', 'CVNxHMS-30.jpg', 'CVNxHMS-33.jpg', 'CVNxHMS-35.jpg', 'CVNxHMS-41.jpg'],
        'HuntingPasar' => ['CVN-3.JPG', 'CVN-5.JPG', 'CVN-6.JPG', 'CVN-7.JPG', 'CVN-9.JPG', 'CVN-10.JPG', 'CVN-11.JPG', 'CVN-14.JPG', 'CVN-22.JPG', 'CVN-24.JPG'],
        'ketoprak' => ['CVNXHMS-15.jpg', 'CVNXHMS-21.jpg', 'CVNXHMS-22.jpg'],
        'arak-arakan' => ['1 (15).JPG', '1 (16).JPG', '1 (17).JPG'],
    ],
    'video' => [],
    'desain' => [],
    'coding' => [],
];

// Function to fix asset paths
function fixAssetPaths($html, $baseUrl) {
    // Fix Laravel asset() helper
    $html = preg_replace('/\{\{\s*asset\([\'"]([^\'"]+)[\'"]\)\s*\}\}/', $baseUrl . '/public/$1', $html);
    
    // Fix @vite directive (replace with built assets)
    $html = preg_replace('/@vite\(\[[\'"]resources\/css\/app\.css[\'"],\s*[\'"]resources\/js\/app\.js[\'"]\]\)/', 
        '<link rel="stylesheet" href="' . $baseUrl . '/public/build/assets/app.css">' . "\n" .
        '<script src="' . $baseUrl . '/public/build/assets/app.js"></script>', 
        $html);
    
    return $html;
}

// Generate homepage
echo "Generating homepage...\n";
$html = view('welcome')->render();
$html = fixAssetPaths($html, $baseUrl);
file_put_contents($outputDir.'/index.html', $html);

// Generate dashboard
echo "Generating dashboard...\n";
$html = view('dashboard')->render();
$html = fixAssetPaths($html, $baseUrl);
if (!is_dir($outputDir.'/dashboard')) {
    mkdir($outputDir.'/dashboard', 0755, true);
}
file_put_contents($outputDir.'/dashboard/index.html', $html);

// Generate portfolio pages
foreach (['foto', 'video', 'desain', 'coding'] as $category) {
    echo "Generating portfolio/{$category}...\n";
    $html = view('portfolio', [
        'category' => $category,
        'folders' => $folders[$category] ?? []
    ])->render();
    $html = fixAssetPaths($html, $baseUrl);
    
    if (!is_dir($outputDir.'/portfolio/'.$category)) {
        mkdir($outputDir.'/portfolio/'.$category, 0755, true);
    }
    file_put_contents($outputDir.'/portfolio/'.$category.'/index.html', $html);
}

// Copy public assets
echo "Copying assets...\n";
$publicDir = __DIR__.'/public';
if (is_dir($publicDir)) {
    copyDirectory($publicDir, $outputDir.'/public');
}

function copyDirectory($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcPath = $src.'/'.$file;
            $dstPath = $dst.'/'.$file;
            if (is_dir($srcPath)) {
                copyDirectory($srcPath, $dstPath);
            } else {
                copy($srcPath, $dstPath);
            }
        }
    }
    closedir($dir);
}

function deleteDirectory($dir) {
    if (!is_dir($dir)) return;
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir.'/'.$file;
        is_dir($path) ? deleteDirectory($path) : unlink($path);
    }
    rmdir($dir);
}

echo "\n✅ Static files generated in {$outputDir}/\n";
echo "📁 Files ready for GitHub Pages deployment!\n";
echo "\nNext steps:\n";
echo "1. Commit the docs/ folder\n";
echo "2. Push to GitHub\n";
echo "3. Enable GitHub Pages in repository settings\n";
echo "4. Set source to 'docs' folder\n";

