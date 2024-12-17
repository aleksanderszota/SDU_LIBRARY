document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const name = "Default Name"; 
        const messageElement = document.getElementById("message");
        const csrfMetaTag = document.querySelector('meta[name="csrf-token"]');

        /*if (!csrfMetaTag) {
            console.error("CSRF token meta tag missing, guys fix it idk who from the group did this");
            messageElement.textContent = "Error: CSRF token not found.";
            messageElement.style.color = "red";
            return;
        }
        */
        // Check for admin credentials
    
        const csrfToken = csrfMetaTag.content;

        // Wysłanie żądania POST
        fetch('/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                name: name,
                email: email,
                password: password
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageElement.textContent = "Account created successfully";
                messageElement.style.color = "green";
                setTimeout(() => {
                    window.location.href = '/second-page'; // Change this path if necessary to match your route
                }, 2000);

            } else {
                messageElement.textContent = "Error: " + data.message;
                messageElement.style.color = "red";
            } //errors used for debugging and some formal messages for the users if something goes wrong
        })
        .catch(error => {
            console.error("Error:", error);
            messageElement.textContent = "An error occurred. Please try again."; //another formal message for the users
            messageElement.style.color = "red";
        });
    });
});
