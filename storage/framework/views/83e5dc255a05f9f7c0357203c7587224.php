<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked Songs</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/liked-songs.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/liked-songs.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>

</head>
<body>

<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

    <div id="likedSongsContainer" class="song-list-container">
        <h2>Liked Songs</h2>
        <ul id="likedSongsList">
            <!-- Liked songs will be rendered here -->
        </ul>
    </div>

<div id="bottomPlayer">
    <button id="playPauseBtn">▶️</button>
    <input type="range" id="progressBar" value="0" step="1" title="Progress">
    <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
    <input type="range" id="volumeControl" min="0" max="100" value="100" title="Volume">
</div>



    <!-- Ensure the script is loaded after the content -->
    <script src="path/to/your/history.js"></script>

    <button class="theme">☀️</button>

</body>
</html>
<?php /**PATH C:\Users\igorm\web-tech\resources\views/liked-songs.blade.php ENDPATH**/ ?>