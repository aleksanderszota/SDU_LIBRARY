<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS files -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/second.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>

    <!-- JavaScript files -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/login.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
</head>
<body>
<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

<div class="container">
    <!-- Formularz logowania -->
    <form id="loginForm">
        <h1>Login</h1>
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
    <p id="message"></p> <!-- Message element for feedback -->
</div>

<button class="theme">☀️</button>

<!-- JavaScript obsługujący formularz -->
<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Zapobiega domyślnej akcji formularza

        // Pobierz dane z formularza
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const messageElement = document.getElementById("message");

        // Pobierz token CSRF z meta tagu
        const csrfMetaTag = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMetaTag ? csrfMetaTag.content : null;

        if (!csrfToken) {
            console.error("CSRF token is missing!");
            messageElement.textContent = "Error: CSRF token not found.";
            messageElement.style.color = "red";
            return;
        }

        // Wysłanie żądania POST do serwera
        fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageElement.textContent = "Account created successfully!";
                messageElement.style.color = "green";
                setTimeout(() => {
                    window.location.href = '/dashboard'; // Przekierowanie po sukcesie
                }, 2000);
            } else {
                messageElement.textContent = "Error: " + data.message;
                messageElement.style.color = "red";
            }
        })
        .catch(error => {
            console.error("Error:", error);
            messageElement.textContent = "An error occurred. Please try again.";
            messageElement.style.color = "red";
        });
    });
</script>

</body>
</html>
<?php /**PATH C:\Users\igorm\web-tech\resources\views/second_page.blade.php ENDPATH**/ ?>