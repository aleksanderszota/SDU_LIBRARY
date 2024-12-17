<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile & Settings</title>
    @vite('resources\css\profile_settings.css') 
    @vite('resources\js\profile_settings.js') 
    @vite('resources/js/theme.js')
    @vite('resources/css/theme.css')

</head>
<body>

<div>
    <img class="background_image" src="{{ asset('icons/dark_background.jpg') }}" 
         data-dark="{{ asset('icons/dark_background.jpg') }}" 
         data-light="{{ asset('icons/light_background.jpg') }}">
</div>

    <div class="container">
        <h1>Profil i Ustawienia</h1>

        <!-- Profile Picture Upload -->
        <div class="form-group">
            <label for="profilePic">Profil i Zdjecie </label>
            <input type="file" id="profilePic" class="form-control" onchange="previewProfilePicture(event)">
            <img id="profilePicPreview" src="#" alt="Profile Picture Preview" style="display: none; width: 150px; height: 150px; margin-top: 10px; border-radius: 50%; object-fit: cover;">
        </div>

       
        <div class="form-group">
            <label>Obecny e-mail: <span id="currentEmail"></span></label>
            <input type="text" id="newEmail" class="form-control" placeholder="New Email">
        </div>

        <div class="form-group">
            <label>Obecne Haslo: <span id="currentPassword"></span></label>
            <input type="password" id="newPassword" class="form-control" placeholder="New Password">
        </div>

        <button onclick="updateProfile()" class="confirm">Zaktualizuj Profil</button>

        <p id="message"></p> 
    </div>

    <button class="theme">☀️</button>
    
</body>
</html>


