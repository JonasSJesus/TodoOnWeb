    <?php Include_once 'Includes/header.php'; ?>

    <?php if (isset($_SESSION['login'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '<?= $_SESSION['login']; ?>',
                confirmButtonColor: '#3085d6'
            });
        </script>
        <?php unset($_SESSION['login']); ?>
    <?php endif; ?>

    <div class="container">
        <h2>Login</h2>
        <form name="login" method="post">
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="password" placeholder="Senha">
            <input type="submit" value="Entrar">
            <a href="/cadastro" >Ou Cadastre-se aqui!</a>
        </form>
    </div>
</body>
</html>
