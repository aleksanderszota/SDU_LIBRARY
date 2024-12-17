document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const messageElement = document.getElementById("message");

        if (email === "Admin" && password === "Admin") {
            messageElement.textContent = "Admin login successful! Redirecting to admin page...";
            messageElement.style.color = "green";
            setTimeout(() => {
                window.location.href = '/admin'; // Redirect to the admin page
            }, 2000);
        }

        // getting the token here
        const csrfMetaTag = document.querySelector('meta[name="csrf-token"]');
        if (!csrfMetaTag) {
            console.error("CSRF token meta tag is missing!");
            messageElement.textContent = "Error: CSRF token not found.";
            messageElement.style.color = "red";
            return;
        }

        const csrfToken = csrfMetaTag.content;

        // Sending a POST request to the Laravel backend
        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageElement.textContent = "Login successful!";
                messageElement.style.color = "green";
                setTimeout(() => {
                    window.location.href = '/music-library'; // Przekierowanie po sukcesie
                }, 2000);
            } else {
                messageElement.textContent = "Error: " + data.message;
                messageElement.style.color = "red";
            }
        })
        .catch(error => {
            console.error("Error:", error);
            messageElement.textContent = "An error occurred. Please try again.";
            messageElement.style.color = "red";
        });
    });
});

