<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDU Music Library</title>
  <?php echo app('Illuminate\Foundation\Vite')('resources\css\playlistsSTYLE.css'); ?> 
  <?php echo app('Illuminate\Foundation\Vite')('resources\js\playlistsSCRIPT.js'); ?> 
  <?php echo app('Illuminate\Foundation\Vite')('resources/js/theme.js'); ?>
  <?php echo app('Illuminate\Foundation\Vite')('resources/css/theme.css'); ?>

</head>
<body>

<div>
    <img class="background_image" src="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-dark="<?php echo e(asset('icons/dark_background.jpg')); ?>" 
         data-light="<?php echo e(asset('icons/light_background.jpg')); ?>">
</div>

  <h1>SDU Music Library</h1>

  <div class="playlist-creator">
    <h2>Create a New Playlist</h2>
    <form id="playlistForm">
      <input type="text" id="playlistName" placeholder="Enter Playlist Name" required>
      <input type="file" id="playlistImage" accept="image/*">
      <button type="submit">Create Playlist</button>
    </form>
  </div>

  <div class="playlists">
    <h2>Your Playlists</h2>
    <div class="sorting-buttons">
      <button onclick="sortPlaylistsAlphabetically()">Sort A-Z</button>
      <button onclick="sortPlaylistsByNewest()">Sort by Newest</button>
      <button onclick="sortPlaylistsByOldest()">Sort by Oldest</button>
    </div>
    <div id="playlistContainer"></div>
  </div>


  <div id="playlistDetails" class="playlist-details hidden">
    <button onclick="closePlaylistDetails()" class="close-button">Back to Playlists</button>
    <div class="details-header">
      <img id="detailsImage" class="playlist-image-large" src="" alt="Playlist Image">
      <div class="details-info">
        <h2 id="detailsTitle" class="playlist-title"></h2>
        <button id="likeButton" onclick="toggleLike()" class="like-button">♡</button>
      </div>
    </div>

    <input type="text" id="searchInput" placeholder="Search for a song">
    <button onclick="searchAndAddSong()" class="action-button">Search and Add</button>

    <ul id="detailsSongs" class="song-list"></ul>

   
    <button id="playPlaylistButton" onclick="window.playPlaylist()" class="action-button">Play Playlist</button>

    
    <div id="playerContainer" class="player-container hidden">
      <button onclick="togglePlay()">▶️</button>
      <button onclick="skipSong()" class="skip-button">⏭️ Skip</button>
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
<?php /**PATH C:\Users\igorm\web-tech\resources\views/playlists.blade.php ENDPATH**/ ?>