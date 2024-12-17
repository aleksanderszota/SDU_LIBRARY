<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/first.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
 
    
</head>
<body>
div class="language-switcher">
    <a href="<?php echo e(route('changeLanguage', 'en')); ?>">English</a>
    <a href="<?php echo e(route('changeLanguage', 'pl')); ?>">Polski</a>
</div>   

<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>


<a href="<?php echo e(route('search_guest')); ?>">
    <button class="btn1">Guest</button>
</a>


<a href="<?php echo e(route('second.page')); ?>">
    <button class="btn2">Log in</button>
</a>


<a href="<?php echo e(route('second.page2')); ?>">
    <button class="btn3">Sign up</button>
</a>

<button class="random"></button>

<button class="theme">☀️</button>



</body>
</html><?php /**PATH C:\Users\igorm\web-tech\resources\views/first_page.blade.php ENDPATH**/ ?>