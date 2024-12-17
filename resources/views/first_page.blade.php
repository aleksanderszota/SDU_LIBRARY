<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>

    @vite('resources/css/first.css')
    @vite('resources/css/theme.css')
    @vite('resources/js/theme.js')
 
    
</head>
<body>
div class="language-switcher">
    <a href="{{ route('changeLanguage', 'en') }}">English</a>
    <a href="{{ route('changeLanguage', 'pl') }}">Polski</a>
</div>   

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>


<a href="{{ route('search_guest') }}">
    <button class="btn1">Guest</button>
</a>


<a href="{{ route('second.page') }}">
    <button class="btn2">Log in</button>
</a>


<a href="{{ route('second.page2') }}">
    <button class="btn3">Sign up</button>
</a>

<button class="random"></button>

<button class="theme">☀️</button>



</body>
</html>