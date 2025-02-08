    <?php include_once 'Includes/header.php'; ?>


    <?php if (isset($_SESSION['update'])): ?>
        <script>
            Swal.fire({
                title: "<?= $_SESSION['update']; ?>",
                icon: "success",
                draggable: true
            });
        </script>
        <?php unset($_SESSION['update']); ?>
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


    <div class="container">
        <h2>Gerenciar Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach($users as $user): ?>
            <tbody>
                <tr>
                <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td>
                        <a href="/edit-user?id=<?= $user->id ?>">Editar</a> |
                        <a href="/delete-user?id=<?= $user->id ?>">Excluir</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

        <h2>Gerenciar Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Usuário</th>
                    <th>Data de Criação</th>
                    <th>Data de Conclusão</th>
                    <th>Prioridade</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach ($tasks as $task): ?>
            <tbody>
                <tr>
                    <td><?= $task->id; ?></td>
                    <td><?= $task->description; ?></td>
                    <td><?= $task->user_id; ?></td>
                    <td><?= $task->created_at; ?></td>
                    <td><?= $task->due_date; ?></td>
                    <td><?= $task->priority; ?></td>
                    <td><?= $task->category; ?></td>
                    <td>
                        <a href="/edit-task?id=<?= $task->id; ?>">Editar</a> |
                        <a href="/delete-task?id=<?= $task->id; ?>">Excluir</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
