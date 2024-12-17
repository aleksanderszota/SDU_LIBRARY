<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked Songs</title>
    @vite('resources/css/liked-songs.css')
    @vite('resources/js/liked-songs.js')
    @vite('resources/js/theme.js')
    @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
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
