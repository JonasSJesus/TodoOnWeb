    <?php require_once 'Includes/header.php'; ?>
    <main class="dashboard">
        <aside class="sidebar">
            <h3>Categories <span class="todo">Implementar filtros!</span></h3>
            <ul>
                <li><a href="#" class="active">All Tasks</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">Personal</a></li>
                <li><a href="#">Shopping</a></li>
            </ul>
            
            <h3>Priority</h3>
            <ul>
                <li><a href="#">High</a></li>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Low</a></li>
            </ul>
        </aside>

        <section class="task-list">
            <h2>My Tasks</h2>
            <div class="tasks">

                <?php foreach ($tasks as $task): ?>
                <div class="task-card priority-<?= $task->priority; ?>">
                    <h3><?= $task->name; ?></h3>
                    <p><?= $task->description; ?></p>
                    <div class="task-meta">
                        <span class="category"><?= $task->category; ?></span>
                        <span class="due-date"><?= $task->due_date; ?></span>
                    </div>
                    <div class="task-actions">
                        <a href="/edit-task?id=<?= $task->getId(); ?>" class="btn-secondary">Edit</a>
                        <a class="btn-danger" href="/delete-task?id=<?= $task->getId(); ?>">Deletar</a>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="task-card priority-medium">
                    <h3><span class="todo">Tarefa FIXA!</span></h3>
                    <p>Buy weekly groceries and household items</p>
                    <div class="task-meta">
                        <span class="category">Shopping</span>
                        <span class="due-date">Due: Mar 15, 2024</span>
                    </div>
                    <div class="task-actions">
                        <a href="edit-task.php" class="btn-secondary">Edit</a>
                        <button class="btn-danger">Delete</button>
                    </div>
                </div>

                <div class="task-card priority-high">
                    <h3><span class="todo">Tarefa FIXA!</span></h3>
                    <p>Write and review the Q2 project proposal document</p>
                    <div class="task-meta">
                        <span class="category">Work</span>
                        <span class="due-date">Due: Mar 20, 2024</span>
                    </div>
                    <div class="task-actions">
                        <a href="edit-task.php" class="btn-secondary">Edit</a>
                        <button class="btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>