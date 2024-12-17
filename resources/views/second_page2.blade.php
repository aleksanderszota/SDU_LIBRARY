<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    @vite('resources\css\second2.css') 
    @vite('resources\js\account.js') 
    @vite('resources/js/theme.js')
    @vite('resources/css/theme.css')
   


</head>

<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
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

</html>