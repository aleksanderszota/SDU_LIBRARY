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
