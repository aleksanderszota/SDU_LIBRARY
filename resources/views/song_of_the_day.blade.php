<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Song of the Day</title>
  @vite('resources/css/song_of_the_day.css')
  @vite('resources/js/song_of_the_day.js')
  @vite('resources/js/theme.js')
  @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

  <header>
    <h1>Your Song of the Day</h1>
  </header>

  <div id="favoritesContainer" class="favoritesContainer">
  <h2>Your Favorite Songs of the Day</h2>
</div>



  <div class="container">
    <div id="songOfTheDayContainer">
      <div id="songOfTheDay">
        <img src="{{ asset('icons/magical_music.jpg') }}" alt="Mystery Image" id="mysteryImage" onclick="revealSong()">
        <div id="songDetails"></div>
        <div id="rating" style="display: none;">
          <span class="star" onclick="rateSong(1)">★</span>
          <span class="star" onclick="rateSong(2)">★</span>
          <span class="star" onclick="rateSong(3)">★</span>
          <span class="star" onclick="rateSong(4)">★</span>
          <span class="star" onclick="rateSong(5)">★</span>
        </div>
      </div>

      <div id="playerContainer" class="player-container" style="display: none;">
        <button onclick="togglePlay()">▶️</button>
        <input type="range" id="progressBar" min="0" value="0" step="1">
        <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
        <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">
      </div>
    </div>

    <div id="notification" class="notification">All shakes for today used up, come back to us tomorrow!</div>

  </div>

  <button class="theme">☀️</button>

</body>
</html>
