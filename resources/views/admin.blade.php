<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/js/admin.js') 

</head>
<body>
    <h1>Admin Dashboard</h1>
    
    
    <h2>Registered Users</h2>
    <ul id="userList">
        
    </ul>

    <button onclick="window.location.href='/music-library'">Music Library</button>
    
</body>
</html>