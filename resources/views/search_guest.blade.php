<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="search.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDU Music Library</title>
  @vite('resources/css/search.css')
  @vite('resources/js/search_guest.js')
  @vite('resources/js/theme.js')
  @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

  <h1>SDU Music Library</h1>

  <!-- Define the songs array here -->
  <script>
    let songs = [
        { name: "Mohammed Ramadan - Ya Habibi", artist: "Mohammed Ramadan", genre: "Pop", album: "Single", url: "{{ asset('music/yahabibi.mp3') }}", favorite: false },
        { name: "Sonderboyz - GLORYFIKACJA", artist: "Sonderboyz", genre: "Rap", album: "Unknown", url: "{{ asset('music/glo.mp3') }}", favorite: false },
        { name: "Travis Scott - FE!N", artist: "Travis Scott", genre: "Hip-Hop", album: "Utopia", url: "{{ asset('music/fein.mp3') }}", favorite: false },
        { name: "Rusina - 10 PAK", artist: "Rusina", genre: "Hip-Hop", album: "Mixtape", url: "{{ asset('music/10pak.mp3') }}", favorite: false },
        { name: "Rihanna - Work", artist: "Rihanna", genre: "Pop", album: "ANTI", url: "{{ asset('music/work.mp3') }}", favorite: false },
        { name: "Playboi Carti - Stop Breathing", artist: "Playboi Carti", genre: "Rap", album: "Whole Lotta Red", url: "{{ asset('music/carti.mp3') }}", favorite: false },
        { name: "Queen - I Want To Break Free", artist: "Queen", genre: "Rock", album: "The Works", url: "{{ asset('music/queen.mp3') }}", favorite: false },
        { name: "Black Eyed Peas - I Gotta Feeling", artist: "Black Eyed Peas", genre: "Pop", album: "The E.N.D.", url: "{{ asset('music/feeling.mp3') }}", favorite: false },
        { name: "HWDP - PRADA OR CELINE", artist: "HWDP", genre: "Trap", album: "Unknown", url: "/music/PRADA_OR_CELINE.mp3", favorite: false },
    ];
  </script>

  <!-- Search and Filter Section -->
  <div class="controls">
    <div class="search">
      <input type="text" id="searchInput" placeholder="Search a song..." oninput="searchAndFilterSongs()">
    </div>
    <div class="filters">
      <select id="artistFilter" onchange="searchAndFilterSongs()">
        <option value="">Filter by Artist</option>
      </select>
      <select id="genreFilter" onchange="searchAndFilterSongs()">
        <option value="">Filter by Genre</option>
      </select>
      <select id="albumFilter" onchange="searchAndFilterSongs()">
        <option value="">Filter by Album</option>
      </select>
      <select id="sortOptions" onchange="searchAndFilterSongs()">
        <option value="">Sort By</option>
        <option value="name">Name</option>
        <option value="artist">Artist</option>
        <option value="genre">Genre</option>
      </select>
    </div>
  </div>

  <!-- Song List -->
  <div class="song-list-container" id="songListContainer">
    <ul class="song-list" id="songList">
      <!-- Song list will be rendered here -->
    </ul>
  </div>
  
  <div class="language-switcher">
    <a href="{{ route('changeLanguage', 'en') }}">English</a>
    <a href="{{ route('changeLanguage', 'pl') }}">Polski</a>
</div>

  <!-- Player Section -->
  <div id="playerContainer" class="player-container">
    <button onclick="togglePlay()">▶️</button>
    <input type="range" id="progressBar" min="0" value="0" step="1">
    <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
    <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1">
  </div>

  <script>
    function populateFilters() {
      const artistFilter = document.getElementById("artistFilter");
      const genreFilter = document.getElementById("genreFilter");
      const albumFilter = document.getElementById("albumFilter");

      const artists = [...new Set(songs.map(song => song.artist))];
      const genres = [...new Set(songs.map(song => song.genre))];
      const albums = [...new Set(songs.map(song => song.album))];

      [artistFilter, genreFilter, albumFilter].forEach(filter => filter.innerHTML = '<option value="">All</option>');

      artists.forEach(artist => {
        artistFilter.innerHTML += `<option value="${artist}">${artist}</option>`;
      });
      genres.forEach(genre => {
        genreFilter.innerHTML += `<option value="${genre}">${genre}</option>`;
      });
      albums.forEach(album => {
        albumFilter.innerHTML += `<option value="${album}">${album}</option>`;
      });
    }

    function searchAndFilterSongs() {
      const query = document.getElementById("searchInput").value.toLowerCase();
      const artist = document.getElementById("artistFilter").value;
      const genre = document.getElementById("genreFilter").value;
      const album = document.getElementById("albumFilter").value;
      const sortOption = document.getElementById("sortOptions").value;

      let filteredSongs = songs.filter(song =>
        (!query || song.name.toLowerCase().includes(query)) &&
        (!artist || song.artist === artist) &&
        (!genre || song.genre === genre) &&
        (!album || song.album === album)
      );

      if (sortOption) {
        filteredSongs.sort((a, b) => a[sortOption].localeCompare(b[sortOption]));
      }

      renderSongs(filteredSongs);
    }

    function renderSongs(songList) {
      const songListElement = document.getElementById("songList");
      songListElement.innerHTML = "";

      songList.forEach((song, index) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
          <span class="${song.favorite ? 'favorite' : ''}">${song.name}</span>
          <div>
            <button onclick="playSong('${song.url}', '${song.name}')">▶️ Play</button>
          </div>
        `;
        songListElement.appendChild(songItem);
      });
    }

    // Initialize the app
    populateFilters();
    renderSongs(songs);
  </script>

<button class="theme">☀️</button>

</body>
</html>
