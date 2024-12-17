window.playlists = [];
window.currentPlaylistId = null;
window.currentSongIndex = 0;
window.audio = new Audio();
window.isPlaying = false;
window.sortMethod = 'newest';

// Songs Search
window.songLibrary = [
    { name: "Mohammed Ramadan - Ya Habibi", url: "/music/yahabibi.mp3", favorite: false },
    { name: "Sonderboyz - GLORYFIKACJA", url: "/music/glo.mp3", favorite: false },
    { name: "Travis Scott - FE!N", url: "/music/fein.mp3", favorite: false },
    { name: "Rusina - 10 PAK", url: "/music/10pak.mp3", favorite: false },
    { name: "Rihanna - Work", url: "/music/work.mp3", favorite: false },
    { name: "Playboi Carti - Stop Breathing", url: "/music/carti.mp3", favorite: false },
    { name: "Queen - I Want To Break Free", url: "/music/queen.mp3", favorite: false },
    { name: "Black Eyed Peas - I Gotta Feeling", url: "/music/feeling.mp3", favorite: false },
    { name: "HWDP - PRADA OR CELINE", url: "/music/PRADA_OR_CELINE.mp3", favorite: false },
];



window.savePlaylistsToStorage = function() {
    localStorage.setItem('playlists', JSON.stringify(window.playlists));
};

window.loadPlaylistsFromStorage = function() {
    const storedPlaylists = localStorage.getItem('playlists');
    if (storedPlaylists) {
        window.playlists = JSON.parse(storedPlaylists);
        window.renderPlaylists();
    }
};
//Image thingy
window.convertImageToBase64 = function(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
        reader.readAsDataURL(file);
    });
};
//PThe playlist form is here
document.getElementById('playlistForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const playlistName = document.getElementById("playlistName").value;
    const playlistImage = document.getElementById("playlistImage").files[0];

    let imageUrl = '';
    if (playlistImage) {
        imageUrl = await window.convertImageToBase64(playlistImage);
    }

    const playlist = {
        id: Date.now(),
        name: playlistName,
        imageUrl: imageUrl,
        songs: [],
        liked: false,
        createdAt: new Date()
    };

    window.playlists.push(playlist);
    window.renderPlaylists();
    window.savePlaylistsToStorage();
    document.getElementById("playlistName").value = '';
    document.getElementById("playlistImage").value = '';
});

window.renderPlaylists = function() {
    window.playlists.sort((a, b) => {
        if (a.liked !== b.liked) {
            return b.liked - a.liked;
        }
        if (window.sortMethod === 'alphabetical') {
            return a.name.localeCompare(b.name);
        } else if (window.sortMethod === 'newest') {
            return b.createdAt - a.createdAt;
        } else if (window.sortMethod === 'oldest') {
            return a.createdAt - b.createdAt;
        }
    });

    const playlistContainer = document.getElementById('playlistContainer');
    playlistContainer.innerHTML = '';
    window.playlists.forEach(playlist => {
        const playlistDiv = document.createElement('div');
        playlistDiv.className = 'playlist-item';
        playlistDiv.innerHTML = `
          <img src="${playlist.imageUrl}" class="playlist-image-small">
          <span onclick="window.openPlaylistDetails(${playlist.id})">${playlist.name}</span>
          <button onclick="window.toggleLike(${playlist.id})" class="like-button">${playlist.liked ? '❤️' : '♡'}</button>
          <button onclick="window.deletePlaylist(${playlist.id})" class="delete-button">🗑️</button>
        `;
        playlistContainer.appendChild(playlistDiv);
    });
};

window.showNotification = function(message) {
    const notification = document.getElementById("notification");
    notification.textContent = message;
    notification.classList.remove("hidden", "hide");
    notification.classList.add("show");

    setTimeout(() => {
        notification.classList.remove("show");
        notification.classList.add("hide");
    }, 3000);
};

window.toggleLike = function(id) {
    const playlist = window.playlists.find(p => p.id === id);
    if (playlist) {
        playlist.liked = !playlist.liked;

        if (id === window.currentPlaylistId) {
            const likeButton = document.getElementById("likeButton");
            likeButton.textContent = playlist.liked ? "❤️" : "♡";
            likeButton.style.color = playlist.liked ? "#e74c3c" : "#ffffff";
        }

        window.renderPlaylists();
        window.savePlaylistsToStorage();
    }
};

window.sortPlaylistsAlphabetically = function() {
    window.sortMethod = 'alphabetical';
    window.renderPlaylists();
};

window.sortPlaylistsByNewest = function() {
    window.sortMethod = 'newest';
    window.renderPlaylists();
};

window.sortPlaylistsByOldest = function() {
    window.sortMethod = 'oldest';
    window.renderPlaylists();
};

window.openPlaylistDetails = function(id) {
    window.currentPlaylistId = id;
    const playlist = window.playlists.find(p => p.id === id);
    if (playlist) {
        document.getElementById("detailsImage").src = playlist.imageUrl;
        document.getElementById("detailsTitle").innerText = playlist.name;
        document.getElementById("detailsSongs").innerHTML = playlist.songs
            .map((song, index) => `<li>${song.name} <button onclick="window.removeSong(${index})">🗑️</button></li>`)
            .join('');
        document.getElementById("playlistDetails").classList.remove('hidden');
        document.getElementById("playPlaylistButton").classList.toggle("hidden", playlist.songs.length === 0);

        const likeButton = document.getElementById("likeButton");
        likeButton.textContent = playlist.liked ? "❤️" : "♡";
        likeButton.style.color = playlist.liked ? "#e74c3c" : "#ffffff";
    }
};

window.searchAndAddSong = function() {
    const query = document.getElementById("searchInput").value.toLowerCase();
    const foundSong = window.songLibrary.find(song => song.name.toLowerCase().includes(query));
    if (foundSong) {
        const playlist = window.playlists.find(p => p.id === window.currentPlaylistId);
        if (playlist) {
            playlist.songs.push(foundSong);
            window.openPlaylistDetails(window.currentPlaylistId);
            window.showNotification(`Added "${foundSong.name}" to the playlist.`);
            window.savePlaylistsToStorage();
        }
    } else {
        window.showNotification("Song not found in library.");
    }
};

window.removeSong = function(index) {
    const playlist = window.playlists.find(p => p.id === window.currentPlaylistId);
    if (playlist) {
        playlist.songs.splice(index, 1);
        window.openPlaylistDetails(window.currentPlaylistId);
        window.savePlaylistsToStorage();
    }
};

window.deletePlaylist = function(id) {
    window.playlists = window.playlists.filter(playlist => playlist.id !== id);
    window.renderPlaylists();
    window.savePlaylistsToStorage();
};

window.playPlaylist = function() {
    const playlist = window.playlists.find(p => p.id === window.currentPlaylistId);
    if (playlist && playlist.songs.length > 0) {
        window.currentSongIndex = 0; // Start with the first song in the playlist, it should start with 0 not 1
        window.playSong(playlist.songs[window.currentSongIndex].url);
    } else {
        console.error("No songs in the playlist or playlist not found.");
        alert("No songs available in this playlist.");
    }
};

window.playSong = function(url) {
    if (window.audio.src !== url) {
        window.audio.src = url;
    }
    window.audio.play().then(() => {
        console.log("Playing audio successfully");
    }).catch(error => {
        console.error("Error playing audio:", error);
        alert("Unable to play audio. Please check browser settings or file paths.");
    });
    window.isPlaying = true;
    window.setupPlayerControls();
    document.getElementById("playerContainer").classList.remove("hidden");
};

window.skipSong = function() {
    const playlist = window.playlists.find(p => p.id === window.currentPlaylistId);
    if (playlist && window.currentSongIndex < playlist.songs.length - 1) {
        window.currentSongIndex++;
        window.playSong(playlist.songs[window.currentSongIndex].url);
    } else {
        window.audio.pause();
        window.isPlaying = false;
    }
};

window.setupPlayerControls = function() {
    const progressBar = document.getElementById("progressBar");
    const currentTimeLabel = document.getElementById("currentTime");
    const durationLabel = document.getElementById("duration");
    const volumeControl = document.getElementById("volumeControl");

    window.audio.addEventListener('timeupdate', () => {
        progressBar.value = window.audio.currentTime;
        currentTimeLabel.textContent = window.formatTime(window.audio.currentTime);
    });

    window.audio.addEventListener('loadedmetadata', () => {
        progressBar.max = window.audio.duration;
        durationLabel.textContent = window.formatTime(window.audio.duration);
    });

    window.audio.addEventListener('ended', () => {
        window.skipSong();
    });

    progressBar.addEventListener('input', () => {
        window.audio.currentTime = progressBar.value;
    });

    volumeControl.addEventListener('input', () => {
        window.audio.volume = volumeControl.value;
    });
};

window.togglePlay = function() {
    if (window.isPlaying) {
        window.audio.pause();
    } else {
        window.audio.play().then(() => {
            console.log("Audio resumed successfully");
        }).catch(error => {
            console.error("Error resuming audio:", error);
        });
    }
    window.isPlaying = !window.isPlaying;
    document.querySelector("button[onclick='togglePlay()']").textContent = window.isPlaying ? "⏸️" : "▶️";
};
//guys check this function because it didnt work for me before

// thanks for fixing
window.formatTime = function(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = Math.floor(seconds % 60);
    return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
};

window.closePlaylistDetails = function() {
    document.getElementById("playlistDetails").classList.add('hidden');
};

window.loadPlaylistsFromStorage();
window.renderPlaylists();
