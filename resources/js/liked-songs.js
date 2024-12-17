//initialising the audio player
let audioPlayer = new Audio(); // creating a new audio player thingy

// this is making the function globally accessible
window.playLikedSong = function(url) {
    if (audioPlayer.src !== url) {
        audioPlayer.src = url;
    }
    audioPlayer.play();

    // Display the currently playing song in the liked songs page on the website
    document.getElementById("bottomPlayer").style.display = "flex";
    document.getElementById("currentSongTitle").textContent = `Playing: ${url}`;
    setupBottomPlayerControls();
};

// again globally accessible
window.stopLikedSong = function() {
    if (!audioPlayer.paused) {
        audioPlayer.pause();
        audioPlayer.currentTime = 0; // Reset the song to the beginning
    }
};

//globally accessible
window.toggleDislikeFromLikedContainer = function(songName) {
    // Retrieve liked songs from localStorage
    let likedSongs = JSON.parse(localStorage.getItem("likedSongs")) || [];

    // Filter out the disliked song
    likedSongs = likedSongs.filter(song => song.name !== songName);

    // Update localStorage with the modified liked songs array
    localStorage.setItem("likedSongs", JSON.stringify(likedSongs));

    // Re-render the liked songs container
    renderLikedSongsInMain();
};

// Already attached to the window in your code
window.renderLikedSongsInMain = function() {
    const likedSongsContainer = document.getElementById("likedSongsList");
    likedSongsContainer.innerHTML = ""; // Clear the current list

    // getting the likeds ongs from localStorage
    const likedSongs = JSON.parse(localStorage.getItem("likedSongs")) || [];

    //this is liked songs container with each liked song
    likedSongs.forEach((song, index) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
            <span>${song.name}</span>
            <div>
                <button onclick="playLikedSong('${song.url}')">▶️ Play</button>
                <button onclick="stopLikedSong()">⏹️ Stop</button>
                <button onclick="toggleDislikeFromLikedContainer('${song.name}')">❤️</button>
            </div>
        `;
        likedSongsContainer.appendChild(songItem);
    });

    // Check if the current user is the admin to show the add song form
    const currentUser = localStorage.getItem("currentUserEmail");
    const isAdmin = currentUser === "Admin"; // Verify if the user is the admin

    if (isAdmin) {
        document.getElementById("addSongForm").style.display = "block";
    } else {
        document.getElementById("addSongForm").style.display = "none";
    }
};

document.addEventListener("DOMContentLoaded", renderLikedSongsInMain);

// Function to add a new song (accessible only to the admin)
window.addSong = function() {
    const currentUser = localStorage.getItem("currentUserEmail");
    if (currentUser !== "Admin") {
        alert("Only the admin can add new songs.");
        return;
    }

    const name = document.getElementById("songNameInput").value;
    const url = document.getElementById("songUrlInput").value;
    if (name && url) {
        let likedSongs = JSON.parse(localStorage.getItem("likedSongs")) || [];
        likedSongs.push({ name, url, favorite: true });
        localStorage.setItem("likedSongs", JSON.stringify(likedSongs));

        document.getElementById("songNameInput").value = "";
        document.getElementById("songUrlInput").value = "";

        alert("Song added successfully!");
        renderLikedSongsInMain();
    } else {
        alert("Please enter both the song name and URL.");
    }
};

let isPlaying = false;


window.playLikedSong = function(url, songName) {
    if (audioPlayer.src !== url) {
        audioPlayer.src = url;
    }
    audioPlayer.play();
    isPlaying = true;

    document.getElementById("currentSongTitle").textContent = `Playing: ${songName}`;
    document.getElementById("bottomPlayer").style.display = "flex";
    setupBottomPlayerControls();
};

window.stopLikedSong = function() {
    if (!audioPlayer.paused) {
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
    }
    isPlaying = false;
};




const playPauseBtn = document.getElementById("playPauseBtn");
const progressBar = document.getElementById("progressBar");
const volumeControl = document.getElementById("volumeControl");
const currentTimeLabel = document.getElementById("currentTime");
const durationLabel = document.getElementById("duration");


// Załaduj ścieżkę audio (zmień URL według potrzeb)
audioPlayer.src = "URL_DO_TWOJEGO_UTWORU"; // Zastąp poprawnym adresem URL pliku audio

// the Pause and Play function
function togglePlayPause() {
    if (isPlaying) {
        audioPlayer.pause();
        playPauseBtn.textContent = "▶️";
    } else {
        audioPlayer.play();
        playPauseBtn.textContent = "⏸️";
    }
    isPlaying = !isPlaying;
}

// Aktualizacja suwaka i czasu
audioPlayer.addEventListener("timeupdate", () => {
    progressBar.value = audioPlayer.currentTime;
    currentTimeLabel.textContent = formatTime(audioPlayer.currentTime);
});

// Aktualizacja maksymalnej długości suwaka po załadowaniu metadanych
audioPlayer.addEventListener("loadedmetadata", () => {
    progressBar.max = audioPlayer.duration;
    durationLabel.textContent = formatTime(audioPlayer.duration);
});

// Przesuwanie piosenki za pomocą suwaka
progressBar.addEventListener("input", () => {
    audioPlayer.currentTime = progressBar.value;
    currentTimeLabel.textContent = formatTime(audioPlayer.currentTime);
});

// Sound reduction
volumeControl.addEventListener("input", () => {
    audioPlayer.volume = volumeControl.value / 100;
});

// Time formatting function
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes}:${remainingSeconds < 10 ? "0" : ""}${remainingSeconds}`;
}

// Przypisanie funkcji przyciskowi Play/Pause
playPauseBtn.addEventListener("click", togglePlayPause);

