//rendering the list of users with this function
function renderUserList() {
    const userList = document.getElementById("userList");
    let users = JSON.parse(localStorage.getItem("users")) || [];

    userList.innerHTML = ""; 
    if (users.length > 0) {
        users.forEach((user, index) => {
            const listItem = document.createElement("li");
            listItem.textContent = `Email: ${user.email} `;

           //simple delete button for each user
            const deleteButton = document.createElement("button");
            deleteButton.textContent = "Delete";
            deleteButton.style.marginLeft = "10px";
            deleteButton.onclick = function() {
                users.splice(index, 1);
                localStorage.setItem("users", JSON.stringify(users));
                renderUserList();
                alert(`User with email "${user.email}" has been deleted.`);
            };
            listItem.appendChild(deleteButton);
            userList.appendChild(listItem);
        });
    } else {
        const noUsersMessage = document.createElement("li");
        noUsersMessage.textContent = "No registered users found.";
        userList.appendChild(noUsersMessage);
    }
}
document.addEventListener("DOMContentLoaded", renderUserList);
