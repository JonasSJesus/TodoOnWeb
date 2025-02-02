    <?php include_once 'Includes/header.php'; ?>

    <?php if (isset($_SESSION['sweet_alert'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '<?= $_SESSION['sweet_alert']; ?>',
                confirmButtonColor: '#3085d6'
            });
        </script>
        <?php unset($_SESSION['sweet_alert']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['updateError'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '<?= $_SESSION['updateError']; ?>',
                confirmButtonColor: '#3085d6'
            });
        </script>
        <?php unset($_SESSION['updateError']); ?>
    <?php endif; ?>


    <main class="container">

        <h2>Editar Usuário</h2>
        <form method="post">
            <div>
                <label for="user-id">ID do Usuário:</label>
                <input type="text" id="user-id" name="id" value="<?= $user->id; ?>" readonly>
            </div>
            <div>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="<?= $user->name; ?>" >
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" value="<?= $user->email; ?>" >
            </div>
            <div>
                <label for="password">Nova Senha (deixe em branco para manter a atual):</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="confirm-password">Confirmar Nova Senha:</label>
                <input type="password" id="confirm-password" name="confirm_password">
            </div>
            <div>
                <label for="role">Função:</label>
                <select id="role" name="role" >
                    <option value="0" <?= $user->is_admin == 0 ? 'selected' : '';  ?>>Usuário</option>
                    <option value="1" <?= $user->is_admin == 1 ? 'selected' : '';  ?>>Administrador</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Salvar Alterações">
                <a href="/admin" class="button">Cancelar</a>
            </div>
        </form>
    </main>
</body>
</html>

