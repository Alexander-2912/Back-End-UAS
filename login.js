function handleLogin(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    // Get form data
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;


    // Basic validation (for example purposes)
    if (email != null && password != null) {
        // Redirect to another page
        window.location.href = "../mainpage/index.html";
    } else {
        // Show an error message
        alert('Invalid username or password');
    }
}