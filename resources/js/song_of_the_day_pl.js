let songs = [
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
  
  

  let currentSong = null;
  const audio = new Audio();
  let attempts = 0; 
  const maxAttempts = 3; 
  
  function showCommentModal(callback) {
    const existingModal = document.getElementById("commentModal");
    if (existingModal) existingModal.remove();
  
    const modal = document.createElement("div");
    modal.id = "commentModal";
    modal.style.position = "fixed";
    modal.style.top = "50%";
    modal.style.left = "50%";
    modal.style.transform = "translate(-50%, -50%)";
    modal.style.backgroundColor = "#1e1e1e";
    modal.style.padding = "20px";
    modal.style.borderRadius = "10px";
    modal.style.zIndex = "1000";
    modal.style.color = "white";
    modal.style.textAlign = "center";
  
    modal.innerHTML = `
      <h3>Add a comment for this song (optional):</h3>
      <textarea id="commentInput" rows="3" style="width: 100%; margin-top: 10px; padding: 10px;"></textarea>
      <div style="margin-top: 10px;">
        <button id="commentSubmit" style="margin-right: 5px; padding: 5px 15px;">OK</button>
        <button id="commentCancel" style="padding: 5px 15px;">Cancel</button>
      </div>
    `;
  
    document.body.appendChild(modal);
  
    document.getElementById("commentSubmit").onclick = () => {
      const comment = document.getElementById("commentInput").value || "No comment";
      callback(comment);
      document.body.removeChild(modal);
    };
  
    document.getElementById("commentCancel").onclick = () => {
      callback(null);
      document.body.removeChild(modal);
    };
  }
  
  window.revealSong = function () {
    const notification = document.getElementById("notification");
  
    if (attempts >= 3) {
      notification.textContent = "No shakes available, come back tomorrow!";
      notification.style.display = "block";
  
      setTimeout(() => {
        notification.style.display = "none";
      }, 3000); 
      return; 
    }
  
    attempts++;
  
    const mysteryImage = document.getElementById("mysteryImage");
    mysteryImage.classList.add("shake");
  
    if (!audio.paused) {
      audio.pause();
      audio.currentTime = 0;
    }
  
    setTimeout(() => {
      mysteryImage.classList.remove("shake");
  
      if (attempts === 1) {
        document.getElementById("rating").style.display = "flex";
      }
  
      changeBackgroundGradient();
  
      const randomIndex = Math.floor(Math.random() * songs.length);
      const song = songs[randomIndex];
  
      document.getElementById("songDetails").innerHTML = `
        <p>${song.name}</p>
      `;
  
      document.getElementById("playerContainer").style.display = "flex";
  
      playSong(song.url, song.name);
  
      resetRating();
      loadRating(song.name);
    }, 500);
  };
  
  
  
  window.changeBackgroundGradient = function () {
    const colors = [
      `#ff7e5f, #feb47b`,
      `#6a11cb, #2575fc`,
      `#ff4b1f, #1fddff`,
      `#ffafbd, #ffc3a0`,
      `#43cea2, #185a9d`,
    ];
    const randomColors = colors[Math.floor(Math.random() * colors.length)];
    document.body.style.background = `linear-gradient(-45deg, ${randomColors})`;
    document.body.style.backgroundSize = "400% 400%";
    document.body.style.animation = "gradientBackground 15s ease infinite";
  };
  
  window.playSong = function (url, songName) {
    if (currentSong !== url) {
      audio.src = url;
      currentSong = { name: songName, url };
    }
    audio.play().then(() => {
      console.log("Playing song:", songName);
      document.querySelector("button[onclick='togglePlay()']").textContent = "⏸️";
    }).catch((error) => {
      console.error("Error playing audio:", error);
      alert("Unable to play audio. Please check browser settings or file paths.");
    });
    setupPlayerControls();
  };
  
  window.setupPlayerControls = function () {
    const progressBar = document.getElementById("progressBar");
    const currentTimeLabel = document.getElementById("currentTime");
    const durationLabel = document.getElementById("duration");
    const volumeControl = document.getElementById("volumeControl");
  
    audio.addEventListener("timeupdate", () => {
      progressBar.value = audio.currentTime;
      progressBar.max = audio.duration; 
      currentTimeLabel.textContent = formatTime(audio.currentTime);
      durationLabel.textContent = formatTime(audio.duration);
    });
  
    progressBar.addEventListener("input", () => {
      audio.currentTime = progressBar.value; 
    });
  
    volumeControl.addEventListener("input", () => {
      audio.volume = volumeControl.value;
    });
  
    audio.addEventListener("ended", () => {
      currentSong = null;
      document.querySelector("button[onclick='togglePlay()']").textContent = "▶️";
    });
  };
  
  window.togglePlay = function () {
    if (audio.paused) {
      audio.play().then(() => {
        console.log("Audio resumed");
        document.querySelector("button[onclick='togglePlay()']").textContent = "⏸️";
      }).catch((error) => {
        console.error("Error resuming audio:", error);
        alert("Unable to resume audio. Please check browser settings or file paths.");
      });
    } else {
      audio.pause();
      document.querySelector("button[onclick='togglePlay()']").textContent = "▶️";
    }
  };
  
  window.rateSong = function (rating) {
    if (!currentSong) {
      alert("No song to rate. Please play a song first.");
      return;
    }
  
    if (rating === 5) {
      showCommentModal((comment) => {
        if (comment !== null) {
          const currentDateTime = new Date().toLocaleString("en-GB", {
            timeZone: "Europe/Warsaw", // Polish timezone
            month: "2-digit",
            day: "2-digit",
            hour: "2-digit",
            minute: "2-digit",

          });
  
          localStorage.setItem(
            `rating_${currentSong.name}`,
            JSON.stringify({ rating, date: currentDateTime, comment })
          );
  
          updateStars(rating);
          addToFavorites(currentSong.name, currentDateTime, comment);
          displayFavorites();
        }
      });
    } else {
      removeFromFavorites(currentSong.name);
      updateStars(rating);
      displayFavorites();
    }
  };
  
  window.updateStars = function (rating) {
    const stars = document.querySelectorAll(".star");
    stars.forEach((star, index) => {
      if (index < rating) {
        star.classList.add("selected");
      } else {
        star.classList.remove("selected");
      }
    });
  };


  window.addToFavorites = function (songName, dateTime, comment) {
    

    let favoriteSongs = JSON.parse(localStorage.getItem("favoriteSongs")) || [];
    const entry = { name: songName, date: dateTime, comment };
  
    if (!favoriteSongs.some((song) => song.name === songName)) {
      favoriteSongs.push(entry);
      localStorage.setItem("favoriteSongs", JSON.stringify(favoriteSongs));
    }
  };
  
  window.removeFromFavorites = function (songName) {
    let favoriteSongs = JSON.parse(localStorage.getItem("favoriteSongs")) || [];
    favoriteSongs = favoriteSongs.filter((song) => song.name !== songName);
    localStorage.setItem("favoriteSongs", JSON.stringify(favoriteSongs));
  };
  
  window.displayFavorites = function () {
    const favoriteSongs = JSON.parse(localStorage.getItem("favoriteSongs")) || [];
    const favoritesContainer = document.getElementById("favoritesContainer");
  
    if (favoriteSongs.length > 0) {
      favoritesContainer.innerHTML = `
        <h2>Your Favorite Songs of the Day</h2>
        <ul>
          ${favoriteSongs
            .map(
              (song) => `
              <li>
                ${song.name} - Rated 5 stars on ${song.date}<br>
                Comment: ${song.comment}
              </li>
            `
            )
            .join("")}
        </ul>
      `;
    } else {
      favoritesContainer.innerHTML = "";
    }
  };
  
  function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes}:${remainingSeconds < 10 ? "0" : ""}${remainingSeconds}`;
  }
  
  document.querySelectorAll(".star").forEach((star, index) => {
    star.addEventListener("click", () => {
      window.rateSong(index + 1);
    });
  });
  
  document.addEventListener("DOMContentLoaded", () => {
    displayFavorites();
  });
  
  window.showNotification = function (message) {
    const notification = document.getElementById("notification");
    notification.textContent = message;
    notification.style.display = "block";
  
    setTimeout(() => {
      notification.style.display = "none";
    }, 2000); 
  };
  