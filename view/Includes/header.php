<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" type="imagem/x-icon" href="img/priority.png">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="logo" style="text-decoration: none;">TaskMaster</a>
            <div class="nav-links">
                <a href="/admin">Admin</a>
                <a href="/" >Dashboard</a>
                <a href="/profile?id=<?= $_SESSION['id']; ?>">Profile</a>
                <a href="/tarefas" class="btn-primary">New Task</a>
                <a href="/logout" class="btn-secondary">Logout</a>
            </div>
        </nav>
    </header>
