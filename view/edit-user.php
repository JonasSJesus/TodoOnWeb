    <?php include_once 'Includes/header.php'; ?>
    <main class="container">
        <h2>Editar Usuário</h2>
        <form method="post" action="/editar-user">
            <div>
                <label for="user-id">ID do Usuário:</label>
                <input type="text" id="user-id" name="id" value="<?= $user->id; ?>" readonly>
            </div>
            <div>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="<?= $user->name; ?>" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= $user->email; ?>" required>
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
                <select id="role" name="role" required>
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

