<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library SDU</title>
    
    <?php echo app('Illuminate\Foundation\Vite')('resources\css\Music_Library.css'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources\js\Music_Library.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>

</head>
<body>

<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

<div class="language-switcher">
    <a href="<?php echo e(route('changeLanguage', 'en')); ?>">English</a>
    <a href="<?php echo e(route('changeLanguage', 'pl')); ?>">Polski</a>
</div>
    <header>
        <h1>Music Library SDU</h1>
    </header>
    <div class="container">
    <a href="<?php echo e(route('liked-songs')); ?>" class="grid-item no-underline">
    <div class="tile-name">Liked Songs</div>
    <img src="<?php echo e(asset('icons2/liked.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('search')); ?>" class="grid-item no-underline">
    <div class="tile-name">Search</div>
    <img src="<?php echo e(asset('icons2/search.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('playlists')); ?>" class="grid-item no-underline">
    <div class="tile-name">Playlist</div>
    <img src="<?php echo e(asset('icons2/playlist.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('history')); ?>" class="grid-item no-underline">
    <div class="tile-name">History of Search</div>
    <img src="<?php echo e(asset('icons2/history.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('profile-settings')); ?>" class="grid-item no-underline">
    <div class="tile-name">Profile & Settings</div>
    <img src="<?php echo e(asset('icons2/settings.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('song-of-the-day')); ?>" class="grid-item no-underline">
    <div class="tile-name">Song of the Day</div>
    <img src="<?php echo e(asset('icons2/sotd.png')); ?>" alt="Search">
</a>
    </div>

    <button class="theme">☀️</button>

</body>
</html>




<?php /**PATH C:\Users\igorm\web-tech\resources\views/Music_Library.blade.php ENDPATH**/ ?>