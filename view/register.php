    <?php include_once 'Includes/header.php'; ?>

    <?php if (isset($_SESSION['register'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '<?= $_SESSION['register']; ?>',
                confirmButtonColor: '#3085d6'
            });
        </script>
        <?php unset($_SESSION['register']); ?>
    <?php endif; ?>

    <div class="container">
       <h2>Cadastro</h2>
        <form name="cadastro" method="post">
            <input type="text" name="name" placeholder="Nome" >
            <input type="email" name="email" placeholder="E-mail" >
            <input type="password" name="password" placeholder="Senha" >
            <input type="password" name="confirm_password" placeholder="Confirmar Senha" >
            <input type="submit" value="Cadastrar">
            <a href="/login" >Ja tem uma conta?</a>
        </form>
    </div>
</body>
</html>
