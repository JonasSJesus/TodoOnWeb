<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>

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

    <div class="auth-container">
      <div class="auth-box">
        <h1>Login</h1>
        <form class="auth-form" method="post">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
          </div>
          <button type="submit">Entrar</button>
        </form>
        <p class="auth-link">
          Não tem uma conta? <a href="/cadastro">Cadastre-se</a>
        </p>
      </div>
    </div>
  </body>
</html>