<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/history.css'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/history.js'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>


</head>
<body>
    
<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

    <!-- History of Search Container -->
    <div id="historyContainer" class="song-list-container">
        <div class="header">
            <h2>Historia</h2>
        </div>
        <ul id="historyList">
            <!-- History will generate here -->
        </ul>
    </div>

    <!-- Bottom player will be showing currently playing song here -->
    <div id="bottomPlayer" style="display: none;">
        <button onclick="audioPlayer.play()">▶️</button>
        <button onclick="audioPlayer.pause()">⏸️</button>
        <span id="currentSongTitle">Playing: </span>
        <input type="range" id="progressBar" min="0" value="0" step="1">
        <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
    </div>

    <button class="theme">☀️</button>

</body>
</html>
<?php /**PATH C:\Users\igorm\web-tech\resources\views/history_pl.blade.php ENDPATH**/ ?>