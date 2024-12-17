<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library SDU</title>
    
    @vite('resources\css\Music_Library.css') 
    @vite('resources\js\Music_Library.js')
    @vite('resources/js/theme.js') 
    @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

<div class="language-switcher">
    <a href="{{ route('changeLanguage', 'en') }}">English</a>
    <a href="{{ route('changeLanguage', 'pl') }}">Polski</a>
</div>
    <header>
        <h1>Music Library SDU</h1>
    </header>
    <div class="container">
    <a href="{{ route('liked-songs') }}" class="grid-item no-underline">
    <div class="tile-name">Liked Songs</div>
    <img src="{{ asset('icons2/liked.png') }}" alt="Search">
</a>
<a href="{{ route('search') }}" class="grid-item no-underline">
    <div class="tile-name">Search</div>
    <img src="{{ asset('icons2/search.png') }}" alt="Search">
</a>
<a href="{{ route('playlists') }}" class="grid-item no-underline">
    <div class="tile-name">Playlist</div>
    <img src="{{ asset('icons2/playlist.png') }}" alt="Search">
</a>
<a href="{{ route('history') }}" class="grid-item no-underline">
    <div class="tile-name">History of Search</div>
    <img src="{{ asset('icons2/history.png') }}" alt="Search">
</a>
<a href="{{ route('profile-settings') }}" class="grid-item no-underline">
    <div class="tile-name">Profile & Settings</div>
    <img src="{{ asset('icons2/settings.png') }}" alt="Search">
</a>
<a href="{{ route('song-of-the-day') }}" class="grid-item no-underline">
    <div class="tile-name">Song of the Day</div>
    <img src="{{ asset('icons2/sotd.png') }}" alt="Search">
</a>
    </div>

    <button class="theme">☀️</button>

</body>
</html>




