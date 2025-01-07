<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App - Login/Cadastro</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <h1>To Do App</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/user">Minha Conta</a></li>
            <li><a href="/login">Login/Cadastro</a></li>
            <li><a href="/admin">Admin</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Login</h2>
        <form name="login" method="post" action="test.php">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
            <a href="/registrar" >Ou Registre-se aqui!</a>
        </form>
    </div>
</body>
</html>
