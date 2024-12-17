<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History of Search</title>
    @vite('resources/css/history.css') 
    @vite('resources/js/history.js') 
    @vite('resources/js/theme.js')
    @vite('resources/css/theme.css')
</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

<!-- Przycisk czyszczenia historii -->
<button id="clearHistoryButton" class="clear-history">🗑️ Clear History</button>

<!-- Kontener historii -->
<div id="historyContainer">
    <div class="header">
        <h2>History of Search</h2>
    </div>
    <ul id="historyList">
        <!-- Historia będzie generowana tutaj -->
    </ul>
</div>

<button class="theme">☀️</button>


<script src="{{ asset('resources/js/history.js') }}"></script>
</body>
</html>


