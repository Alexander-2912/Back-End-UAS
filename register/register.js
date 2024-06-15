function handleLogin(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    // Get form data
    const username = document.getElementById('register-username').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirm = document.getElementById('register-confirm').value;


    // Basic validation (for example purposes)
    if (username != null && password != null && email != null && confirm != null) {
        // Redirect to another page
        window.location.href = "../login/login.html";
    } else {
        // Show an error message
        alert('Invalid username or password');
    }
}