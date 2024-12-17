<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka Muzyczna SDU</title>
    
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
    <a href="<?php echo e(route('changeLanguage', 'en')); ?>">Angielski</a>
    <a href="<?php echo e(route('changeLanguage', 'pl')); ?>">Polski</a>
</div>

    <header>
        <h1>Biblioteka Muzyczna SDU</h1>
    </header>
    <div class="container">
    <a href="<?php echo e(route('liked-songs')); ?>" class="grid-item no-underline">
    <div class="tile-name">Polubione</div>
    <img src="<?php echo e(asset('icons2/liked.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('search')); ?>" class="grid-item no-underline">
    <div class="tile-name">Szukaj</div>
    <img src="<?php echo e(asset('icons2/search.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('playlists')); ?>" class="grid-item no-underline">
    <div class="tile-name">Playlisty</div>
    <img src="<?php echo e(asset('icons2/playlist.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('history')); ?>" class="grid-item no-underline">
    <div class="tile-name">Historia Wyszukiwania</div>
    <img src="<?php echo e(asset('icons2/history.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('profile-settings')); ?>" class="grid-item no-underline">
    <div class="tile-name">Profil i Ustawienia</div>
    <img src="<?php echo e(asset('icons2/settings.png')); ?>" alt="Search">
</a>
<a href="<?php echo e(route('song-of-the-day')); ?>" class="grid-item no-underline">
    <div class="tile-name">Piosenka Dnia</div>
    <img src="<?php echo e(asset('icons2/sotd.png')); ?>" alt="Search">
</a>
    </div>

    <button class="theme">☀️</button>

</body>
</html>




<?php /**PATH C:\Users\igorm\web-tech\resources\views/Music_Library_pl_with_switcher.blade.php ENDPATH**/ ?>