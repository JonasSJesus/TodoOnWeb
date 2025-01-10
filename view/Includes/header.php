<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App - Administração</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <h1>To Do App - Administração</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/user">Minha Conta</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/cadastro">Cadastro</a></li>
            <li><a href="/admin">Admin</a></li>
            <?php var_dump($_SESSION['nome']); ?>
        </ul>
    </nav>
