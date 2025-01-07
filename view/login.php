    <?php require_once 'header.php'; ?>
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
