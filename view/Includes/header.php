<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App - Administração</title>
    <link rel="stylesheet" href="./css/styles.css">
    <!--API do SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>To Do App - Administração</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/tarefas">Minhas Tarefas</a></li>
            <li><a href="/edit-user?id=<?= $_SESSION['id']?>" >Minha Conta</a></li>
            <li><a href="/logout">Logout</a></li>
            <?php if (array_key_exists('is_admin', $_SESSION) and  $_SESSION['is_admin'] == 1){
                echo "<li><a href=\"/admin\">Admin</a></li>";
            } ?>
            <li><a><strong>Usuário: </strong><?= $_SESSION['nome']?></a></li>
        </ul>
    </nav>
