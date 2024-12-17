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
        <h2>Polubione</h2>
        <ul id="likedSongsList">
            <!-- Liked songs will be rendered here -->
        </ul>
    </div>

    <div id="bottomPlayer" style="display: none;">
        <button onclick="audioPlayer.play()">▶️</button>
        <button onclick="audioPlayer.pause()">⏸️</button>
        <span id="currentSongTitle">Playing: </span>
        <input type="range" id="progressBar" min="0" value="0" step="1">
        <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
    </div>

    <!-- Ensure the script is loaded after the content -->
    <script src="path/to/your/history.js"></script>

    <button class="theme">☀️</button>

</body>
</html>
<?php /**PATH C:\Users\igorm\web-tech\resources\views/liked-songs_pl.blade.php ENDPATH**/ ?>