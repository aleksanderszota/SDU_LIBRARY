console.log('Script loaded'); // debug

let currentSong = null;
const audio = new Audio();

window.playSong = function(url, songName) {
    console.log('playSong called with URL:', url, 'and song name:', songName); // debug
    if (currentSong !== url) {
        audio.src = url;
        currentSong = url;
    }
    audio.play().then(() => {
        console.log(`Playing song: ${songName}`);
        addToHistory(songName, url); 
    }).catch(error => {
        console.error('Error playing audio:', error);
    });
    setupPlayerControls();
};

window.addToHistory = function(songName, url) {
    try {
        const history = JSON.parse(localStorage.getItem("history")) || [];
        const timestamp = new Date().toLocaleString();

        // adding a song
        history.unshift({ name: songName, url: url, timestamp: timestamp });
        localStorage.setItem("history", JSON.stringify(history));
        console.log(`Added ${songName} to history.`);

        if (document.getElementById("historyList")) {
            renderHistory();
        }
    } catch (error) {
        console.error('Error adding song to history:', error);
    }
};

function renderHistory() {
    const historyList = document.getElementById("historyList");
    if (!historyList) {
        console.error("Element with ID 'historyList' not found.");
        return;
    }

    historyList.innerHTML = "";

    const history = JSON.parse(localStorage.getItem("history")) || [];
    console.log("Rendering history:", history); //also a debug

    history.forEach((song) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
            <span>${song.name || "Unnamed Song"} <small>(${song.timestamp})</small></span>
        `;
        historyList.appendChild(songItem);
    });
}

window.renderSongs = function() {
    const songList = document.getElementById("songList");
    songList.innerHTML = "";
    songs.forEach((song, index) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
            <span class="${song.favorite ? 'favorite' : ''}">${song.name}</span>
            <div>
                <button onclick="playSong('${song.url}', '${song.name}')">▶️ Play</button>
                <button onclick="toggleFavorite(${index})">${song.favorite ? "💔" : "❤️"}</button>
            </div>
        `;
        songList.appendChild(songItem);
    });
};

// SONG LIKING
window.toggleFavorite = function(index) {
    const likedSongs = JSON.parse(localStorage.getItem("likedSongs")) || [];
    const song = songs[index];
    const isLiked = likedSongs.some(s => s.name === song.name);

    if (isLiked) {
        
        const updatedSongs = likedSongs.filter(s => s.name !== song.name);
        localStorage.setItem("likedSongs", JSON.stringify(updatedSongs));
    } else {
    
        likedSongs.push(song);
        localStorage.setItem("likedSongs", JSON.stringify(likedSongs));
    }

    
    const songItems = document.querySelectorAll(".song-item");
    const button = songItems[index].querySelector("button:nth-child(2)");
    button.classList.toggle("liked", !isLiked);
    
    // changing the icon
    button.innerHTML = isLiked ? "❤️" : "💔";
};


function setupPlayerControls() {
    const progressBar = document.getElementById("progressBar");
    const currentTimeLabel = document.getElementById("currentTime");
    const durationLabel = document.getElementById("duration");
    const volumeControl = document.getElementById("volumeControl");

    audio.addEventListener('timeupdate', () => {
        progressBar.value = audio.currentTime;
        currentTimeLabel.textContent = formatTime(audio.currentTime);
    });

    audio.addEventListener('loadedmetadata', () => {
        progressBar.max = audio.duration;
        durationLabel.textContent = formatTime(audio.duration);
    });

    audio.addEventListener('ended', () => {
        currentSong = null;
    });

    progressBar.addEventListener('input', () => {
        audio.currentTime = progressBar.value;
    });

    volumeControl.addEventListener('input', () => {
        audio.volume = volumeControl.value;
    });
}

window.togglePlay = function() {
    if (audio.paused) {
        audio.play().then(() => {
            console.log("Audio resumed");
        }).catch(error => {
            console.error('Error resuming audio:', error);
        });
    } else {
        audio.pause();
    }
};

window.searchSongs = function() {
    const query = document.getElementById("searchInput").value.toLowerCase();
    const filteredSongs = songs.filter(song => song.name.toLowerCase().includes(query));
    const songList = document.getElementById("songList");
    songList.innerHTML = "";
    filteredSongs.forEach((song, index) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
            <span class="${song.favorite ? 'favorite' : ''}">${song.name}</span>
            <div>
                <button onclick="playSong('${song.url}', '${song.name}')">▶️ Play</button>
                <button onclick="toggleFavorite(${index})">❤️</button>
            </div>
        `;
        songList.appendChild(songItem);
    });
};

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

// Isong rendering
renderSongs();
