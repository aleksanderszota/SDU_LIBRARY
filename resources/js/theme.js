
//here i made it possible to change between the light and dark theme

function applySavedWallpaper() {
    const backgroundImage = document.querySelector('.background_image');
    const darkBackground = backgroundImage.getAttribute('data-dark');
    const lightBackground = backgroundImage.getAttribute('data-light');
    const savedWallpaper = localStorage.getItem('wallpaper');
    if (savedWallpaper === 'light') {
        backgroundImage.src = lightBackground;
    } else {
        backgroundImage.src = darkBackground; 
    }
}
function switchWallpaper() {
    const backgroundImage = document.querySelector('.background_image');
    const darkBackground = backgroundImage.getAttribute('data-dark');
    const lightBackground = backgroundImage.getAttribute('data-light');  
    if (backgroundImage.src.includes('dark_background')) {
        backgroundImage.src = lightBackground; 
        localStorage.setItem('wallpaper', 'light'); 
    } else {
        backgroundImage.src = darkBackground; 
        localStorage.setItem('wallpaper', 'dark');
    }
}
document.addEventListener('DOMContentLoaded', applySavedWallpaper);
document.querySelector('.theme').addEventListener('click', switchWallpaper);
