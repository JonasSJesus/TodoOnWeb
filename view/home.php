<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Home</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">TaskMaster</div>
            <div>
                <a href="/login" class="btn-primary primary">Entrar</a>
            </div>
        </nav>
    </header>

    <?php if (isset($_SESSION['error_message'])): ?>
        <h2 class="formulario__titulo erro" >
            <?= $_SESSION['error_message']; ?>
            <?php unset($_SESSION['error_message']); ?>
        </h2>
    <?php endif; ?>

    <main class="home">
        <section class="hero">
            <h1>Track Your Tasks, Boost Your Productivity</h1>
            <p>TaskMaster helps you organize and prioritize your work efficiently.</p>
            <a href="/cadastro" class="btn-primary">Get Started</a>
        </section>

        <section class="features">
            <h2>Why Choose TaskMaster?</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <h3>Priority Management</h3>
                    <p>Organize tasks by priority and never miss important deadlines.</p>
                </div>
                <div class="feature-card">
                    <h3>Categories</h3>
                    <p>Group related tasks together for better organization.</p>
                </div>
                <div class="feature-card">
                    <h3>Due Dates</h3>
                    <p>Set and track deadlines for all your tasks.</p>
                </div>
                <div class="feature-card">
                    <h3>User Profiles</h3>
                    <p>Personalize your experience with custom user profiles.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 TaskMaster.</p>
    </footer>
</body>
</html>