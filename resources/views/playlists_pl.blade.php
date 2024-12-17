<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteka Muzyczna SDU</title>
  @vite('resources\css\playlistsSTYLE.css') 
  @vite('resources\js\playlistsSCRIPT.js') 
  @vite('resources/js/theme.js')
  @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

  <h1>Biblioteka Muzyczna SDU</h1>

  <div class="playlist-creator">
    <h2>Utwórz Nową Listę Odtwarzania</h2>
    <form id="playlistForm">
      <input type="text" id="playlistName" placeholder="Wprowadź nazwę listy odtwarzania" required>
      <input type="file" id="playlistImage" accept="image/*">
      <button type="submit">Utwórz Listę</button>
    </form>
  </div>

  <div class="playlists">
    <h2>Twoje Listy Odtwarzania</h2>
    <div class="sorting-buttons">
      <button onclick="sortPlaylistsAlphabetically()">Sortuj A-Z</button>
      <button onclick="sortPlaylistsByNewest()">Sortuj od najnowszych</button>
      <button onclick="sortPlaylistsByOldest()">Sortuj od najstarszych</button>
    </div>
    <div id="playlistContainer"></div>
  </div>

  
  <div id="playlistDetails" class="playlist-details hidden">
    <button onclick="closePlaylistDetails()" class="close-button">Powrót do List</button>
    <div class="details-header">
      <img id="detailsImage" class="playlist-image-large" src="" alt="Obraz Listy Odtwarzania">
      <div class="details-info">
        <h2 id="detailsTitle" class="playlist-title"></h2>
        <button id="likeButton" onclick="toggleLike()" class="like-button">♡</button>
      </div>
    </div>

    <input type="text" id="searchInput" placeholder="Wyszukaj utwór">
    <button onclick="searchAndAddSong()" class="action-button">Wyszukaj i Dodaj</button>

    <ul id="detailsSongs" class="song-list"></ul>

    
    <button id="playPlaylistButton" onclick="window.playPlaylist()" class="action-button">Odtwórz Listę</button>

    
    <div id="playerContainer" class="player-container hidden">
      <button onclick="togglePlay()">▶️</button>
      <button onclick="skipSong()" class="skip-button">⏭️ Pomiń</button>
      <input type="range" id="progressBar" min="0" value="0" step="1">
      <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
      <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">
    </div>
  </div>
  <div id="notification" class="notification hidden">
  </div>

  <button class="theme">☀️</button>

</body>
</html>