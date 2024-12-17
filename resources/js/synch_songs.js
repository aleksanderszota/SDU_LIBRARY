// Lista piosenek
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

// Funkcja do synchronizacji piosenek z bazą danych
async function syncSongsToDatabase() {
    try {
        const response = await fetch('/songs/import', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ songs }), // Przekazujemy listę piosenek jako JSON
        });

        if (response.ok) {
            console.log('Songs imported successfully!');
        } else {
            console.error('Failed to import songs.');
        }
    } catch (error) {
        console.error('Error syncing songs:', error);
    }
}

// Automatyczne wywołanie synchronizacji
document.addEventListener('DOMContentLoaded', () => {
    syncSongsToDatabase();
});