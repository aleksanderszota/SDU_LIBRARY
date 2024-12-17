<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <?php echo app('Illuminate\Foundation\Vite')('resources\css\second2.css'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources\js\account.js'); ?> 
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>
   


</head>

<body>

<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

    <div class="container">
        <form id="loginForm">
            <h1>Sign up</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" required>
            </div>
            <input type="submit" class="confirm" value="Create Account">
        </form>
        <p id="message"></p> 
    </div>

    <button class="theme">☀️</button>


</body>

</html><?php /**PATH C:\Users\igorm\web-tech\resources\views/second_page2.blade.php ENDPATH**/ ?>