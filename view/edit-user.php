    <?php include_once 'Includes/header.php'; ?>
    <main class="container">
        <h2>Editar Usuário</h2>
        <form action="admin.html" method="get">
            <div>
                <label for="user-id">ID do Usuário:</label>
                <input type="text" id="user-id" name="user-id" value="<?php $user ?>" readonly>
            </div>
            <div>
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="João Silva" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="joao@example.com" required>
            </div>
            <div>
                <label for="password">Nova Senha (deixe em branco para manter a atual):</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="confirm-password">Confirmar Nova Senha:</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div>
            <div>
                <label for="role">Função:</label>
                <select id="role" name="role" required>
                    <option value="user" selected>Usuário</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Salvar Alterações">
                <a href="admin.html" class="button">Cancelar</a>
            </div>
        </form>
    </main>

</body>
</html>

