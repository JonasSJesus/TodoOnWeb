<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="/css/login.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="auth-container">
      <div class="auth-box">
        <h1>Cadastro</h1>

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


        <form class="auth-form" method="post">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="confirm-password">Confirmar Senha:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
          </div>
          <button type="submit">Cadastrar</button>
        </form>
        <p class="auth-link">
          Já tem uma conta? <a href="/login">Fazer login</a>
        </p>
      </div>
    </div>
  </body>
</html>