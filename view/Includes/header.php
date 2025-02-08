<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster - Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">TaskMaster</div>
            <div class="nav-links">
                <a href="/admin">Admin</a>
                <a href="/" >Dashboard</a>
                <a href="/profile?id=<?= $_SESSION['id']; ?>">Profile</a>
                <a href="/tarefas" class="btn-primary">New Task</a>
                <a href="/logout" class="btn-secondary">Logout</a>
            </div>
        </nav>
    </header>
