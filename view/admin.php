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
                        <td><?= $user->id; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>2024-03-10</td>
                        <td>
                            <button class="btn-secondary btn-small"><a href="/profile?id=<?= $user->id ?>">Edit</a></button>
                            <button class="btn-danger btn-small">Delete</button>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $task->id; ?></td>
                        <td><?= $task->user_id; ?></td>
                        <td><?= $task->name; ?></td>
                        <td><span class="priority-low"><?= $task->priority; ?></span></td>
                        <td><?= $task->created_at; ?></td>
                        <td><?= $task->due_date; ?></td>
                        <td>
                            <button class="btn-secondary btn-small">Edit</button>
                            <button class="btn-danger btn-small">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>