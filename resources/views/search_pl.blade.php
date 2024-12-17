<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SDU Music Library</title>
  @vite('resources/css/search.css')
  @vite('resources/js/Search.js')
  @vite('resources/js/theme.js')
  @vite('resources/css/theme.css')
  @vite('resources/js/synch_songs.js')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

  <h1>Biblioteka muzyczna SDU</h1>
<!-- initial songs-->
<script>
  let songs = [
      { name: "Mohammed Ramadan - Ya Habibi", artist: "Mohammed Ramadan", genre: "Pop", album: "Single", url: "/music/yahabibi.mp3", favorite: false },
      { name: "Sonderboyz - GLORYFIKACJA", artist: "Sonderboyz", genre: "Rap", album: "Unknown", url: "/music/glo.mp3", favorite: false },
      { name: "Travis Scott - FE!N", artist: "Travis Scott", genre: "Hip-Hop", album: "Utopia", url: "/music/fein.mp3", favorite: false },
      { name: "Rusina - 10 PAK", artist: "Rusina", genre: "Hip-Hop", album: "Mixtape", url: "/music/10pak.mp3", favorite: false },
      { name: "Rihanna - Work", artist: "Rihanna", genre: "Pop", album: "ANTI", url: "/music/work.mp3", favorite: false },
      { name: "Playboi Carti - Stop Breathing", artist: "Playboi Carti", genre: "Rap", album: "Whole Lotta Red", url: "/music/carti.mp3", favorite: false },
      { name: "Queen - I Want To Break Free", artist: "Queen", genre: "Rock", album: "The Works", url: "/music/queen.mp3", favorite: false },
      { name: "Black Eyed Peas - I Gotta Feeling", artist: "Black Eyed Peas", genre: "Pop", album: "The E.N.D.", url: "/music/feeling.mp3", favorite: false },
      { name: "HWDP - PRADA OR CELINE", artist: "HWDP", genre: "Trap", album: "Unknown", url: "/music/PRADA_OR_CELINE.mp3", favorite: false },
  ];
</script>

  <!-- Your existing HTML content -->
  <div class="search">
    <input type="text" id="searchInput" placeholder="Search a song..." oninput="searchSongs()">
  </div>
  <div class="song-list-container" id="songListContainer">
    <ul class="song-list" id="songList">
      <!-- Song list will be rendered here -->
    </ul>
  </div>
  <input type="text" id="songNameInput" placeholder="Song name">
  <input type="text" id="songUrlInput" placeholder="Song URL">
  <button onclick="addSong()">Dodaj Piosenke</button>
  <div id="playerContainer" class="player-container">
    <button onclick="togglePlay()">▶️</button>
    <input type="range" id="progressBar" min="0" value="0" step="1">
    <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
    <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">
  </div>

  <button class="theme">☀️</button>

</body>
</html>
