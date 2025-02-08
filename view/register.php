<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Register</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="auth-container">
        <form class="auth-form" method="post">
            <h2>Create Account</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" required>
            </div>
            <button type="submit" class="btn-primary">Register</button>
            <p class="auth-link">Already have an account? <a href="/login">Login</a></p>
        </form>
    </div>
</body>
</html>