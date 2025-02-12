    <?php require_once 'Includes/header.php'; ?>

    <main class="admin-dashboard">
        <section class="admin-section">
            <h2>Users</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php foreach($users as $user): ?>
                <tbody>
                    <tr>
                        <td><?= $user->getId(); ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>2024-03-10</td>
                        <td>
                            <a class="btn-secondary btn-small" href="/profile?id=<?= $user->getId() ?>">Edit</a>
                            <a href="/delete-user?id=<?= $user->getId(); ?>" class="btn-danger btn-small">Delete</a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </section>

        <section class="admin-section">
            <h2>Tasks</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Task Name</th>
                        <th>Priority</th>
                        <th>Data de Criação</th>
                        <th>Due Date</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task->getId(); ?></td>
                        <td><?= $task->user_id; ?></td>
                        <td><?= $task->name; ?></td>
                        <td><span class="priority-low"><?= $task->priority; ?></span></td>
                        <td><?= $task->created_at; ?></td>
                        <td><?= $task->due_date; ?></td>
                        <td>
                            <a class="btn-secondary btn-small" href="/edit-task?id=<?= $task->getId() ?>">Edit</a>
                            <a href="/delete-task?id=<?= $task->getId(); ?>" class="btn-danger btn-small">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>