window.addEventListener("DOMContentLoaded", function() {
    const currentEmail = localStorage.getItem("currentUserEmail");
    const currentPassword = localStorage.getItem(currentEmail);

    document.getElementById("currentEmail").textContent = currentEmail || "Not set";
    document.getElementById("currentPassword").textContent = currentPassword ? "●●●●●●●●" : "Not set";
});

window.updateProfile = function() {
    const newEmail = document.getElementById("newEmail").value;
    const newPassword = document.getElementById("newPassword").value;
    const messageElement = document.getElementById("message");
    const currentEmail = localStorage.getItem("currentUserEmail");

    if (newEmail && newEmail !== currentEmail && localStorage.getItem(newEmail)) {
        messageElement.textContent = "Email already taken.";
        messageElement.style.color = "red";
    } else {
        // Update credentials in localStorage
        if (newEmail && newEmail !== currentEmail) {
            localStorage.removeItem(currentEmail);
            localStorage.setItem(newEmail, newPassword || localStorage.getItem(currentEmail));
            localStorage.setItem("currentUserEmail", newEmail);
        }
        if (newPassword) {
            localStorage.setItem(localStorage.getItem("currentUserEmail"), newPassword);
        }

        messageElement.textContent = "Profile updated successfully!";
        messageElement.style.color = "green";
    }
};

window.previewProfilePicture = function(event) {
    const profilePicPreview = document.getElementById("profilePicPreview");
    const file = event.target.files[0];
    
    if (file) {
        profilePicPreview.src = URL.createObjectURL(file);
        profilePicPreview.style.display = "block";
    }
};
