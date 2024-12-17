window.navigate = function(page) {
    window.location.href = page;
};

window.audio = new Audio();
window.currentSong = null;

window.playSong = function(name, url) {
    // Check if a new song is being selected here
    if (window.currentSong !== url) {
        window.audio.src = url; // Set the new song source
        window.currentSong = url;
    }
    
    window.audio.play(); // Playing of the song
    window.addToRecentlyPlayed(name, url); // and then this adds the song to recently played list
};

window.addToRecentlyPlayed = function(name, url) {
    const recentlyPlayed = JSON.parse(localStorage.getItem("recentlyPlayed")) || [];
    
    // Remove the song if it already exists, to avoid duplicates
    const existingIndex = recentlyPlayed.findIndex(song => song.url === url);
    if (existingIndex !== -1) recentlyPlayed.splice(existingIndex, 1);
    
    recentlyPlayed.unshift({ name, url }); // Add the song to the beginning of the list
    if (recentlyPlayed.length > 10) recentlyPlayed.pop(); // Limit history to 10 songs
    
    localStorage.setItem("recentlyPlayed", JSON.stringify(recentlyPlayed)); // Save updated list
};
