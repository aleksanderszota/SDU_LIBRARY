//checking the DOM
document.addEventListener("DOMContentLoaded", renderHistory);

//getting the references to the history list container 
const historyList = document.getElementById("historyList");
const clearHistoryButton = document.getElementById("clearHistoryButton");

// Funkcja renderowania historii
function renderHistory() {
    const history = JSON.parse(localStorage.getItem("history")) || [];
    historyList.innerHTML = "";

    history.forEach((song, index) => {
        const songItem = document.createElement("li");
        songItem.className = "song-item";
        songItem.innerHTML = `
            <span>${song.name || "Unnamed Song"} <small>(${song.timestamp})</small></span>
            <button class="remove-button" onclick="removeSong(${index})">Remove</button>
        `;
        historyList.appendChild(songItem);
    });
}

// this function is for removing a single element
window.removeSong = function(index) {
    let history = JSON.parse(localStorage.getItem("history")) || [];
    history.splice(index, 1);
    localStorage.setItem("history", JSON.stringify(history));
    renderHistory();
};

// this one cleans the whole history
clearHistoryButton.addEventListener("click", () => {
    localStorage.removeItem("history");
    renderHistory();
});
