<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Login</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <div class="auth-container">
        <form class="auth-form" method="post">
            <h2>Login to TaskMaster</h2>
            <?php if (isset($_SESSION['error_message'])): ?>
                <h3 class="formulario__titulo erro" >
                    <?= $_SESSION['error_message']; ?>
                    <?php unset($_SESSION['error_message']); ?>
                </h3>
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
            <p class="auth-link">Don't have an account? <a href="/cadastro">Register</a></p>
        </form>
    </div>
</body>
</html>