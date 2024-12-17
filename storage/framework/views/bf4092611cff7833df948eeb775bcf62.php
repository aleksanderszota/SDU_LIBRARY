<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History of Search</title>
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

<!-- Przycisk czyszczenia historii -->
<button id="clearHistoryButton" class="clear-history">🗑️ Clear History</button>

<!-- Kontener historii -->
<div id="historyContainer">
    <div class="header">
        <h2>History of Search</h2>
    </div>
    <ul id="historyList">
        <!-- Historia będzie generowana tutaj -->
    </ul>
</div>

<button class="theme">☀️</button>


<script src="<?php echo e(asset('resources/js/history.js')); ?>"></script>
</body>
</html>


<?php /**PATH C:\Users\igorm\web-tech\resources\views/history.blade.php ENDPATH**/ ?>