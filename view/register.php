    <?php include_once 'Includes/header.php'; ?>
    <div class="container">
       <h2>Cadastro</h2>
        <form name="cadastro" method="post">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="confirm_password" placeholder="Confirmar Senha" required>
            <input type="submit" value="Cadastrar">
            <a href="/login" >Ja tem uma conta?</a>
        </form>
    </div>
</body>
</html>
