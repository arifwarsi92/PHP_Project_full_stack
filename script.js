document.getElementById('loginForm').addEventListener('submit', function(event) {
    // Example JavaScript validation
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    if (username === "" || password === "") {
        event.preventDefault();
        document.getElementById('error-message').innerText = "Please fill in both fields.";
    }
});
