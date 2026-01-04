<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/portfolio/{category}', function ($category) {
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
    
    return view('portfolio', [
        'category' => $category,
        'folders' => $folders[$category] ?? []
    ]);
});

Route::get('/portfolio/{category}/{folder}', function ($category, $folder) {
    $folderMap = [
        'DayakNite' => 'DayakNite',
        'Dfest' => 'Dfest',
        'eco' => 'eco',
        'HuntingPasar' => 'HuntingPasar',
        'ketoprak' => 'ketoprak',
        'arak-arakan' => 'arak arakan',
    ];
    
    $actualFolder = $folderMap[$folder] ?? $folder;
    
    $images = [
        'DayakNite' => ['1 (1).jpg', '1 (18).jpg', '1 (19).jpg', '1 (20).jpg', '1 (21).jpg', '1 (22).jpg', '1 (23).jpg', '1 (24).jpg'],
        'Dfest' => ['1 (9).jpg', '1 (10).jpg', '1 (11).jpg', '1 (12).jpg', '1 (13).jpg', '1 (14).jpg'],
        'eco' => ['CVNxHMS.jpg', 'CVNxHMS-4.jpg', 'CVNxHMS-9.jpg', 'CVNxHMS-11.jpg', 'CVNxHMS-12.jpg', 'CVNxHMS-13.jpg', 'CVNxHMS-14.jpg', 'CVNxHMS-15.jpg', 'CVNxHMS-19.jpg', 'CVNxHMS-23.jpg', 'CVNxHMS-30.jpg', 'CVNxHMS-33.jpg', 'CVNxHMS-35.jpg', 'CVNxHMS-41.jpg'],
        'HuntingPasar' => ['CVN-3.JPG', 'CVN-5.JPG', 'CVN-6.JPG', 'CVN-7.JPG', 'CVN-9.JPG', 'CVN-10.JPG', 'CVN-11.JPG', 'CVN-14.JPG', 'CVN-22.JPG', 'CVN-24.JPG'],
        'ketoprak' => ['CVNXHMS-15.jpg', 'CVNXHMS-21.jpg', 'CVNXHMS-22.jpg'],
        'arak arakan' => ['1 (15).JPG', '1 (16).JPG', '1 (17).JPG'],
    ];
    
    return view('gallery', [
        'category' => $category,
        'folder' => $actualFolder,
        'images' => $images[$actualFolder] ?? []
    ]);
});
