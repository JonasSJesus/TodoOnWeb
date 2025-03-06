    <?php require_once 'Includes/header.php'; ?>
    <main class="dashboard">
        <aside class="sidebar">
            <h3>Categories <br><span class="todo">Not working...</span></h3>
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
                        <span class="due-date"><?= 'Due: ' . $task->getDueDate(); ?></span>
                    </div>
                    <div class="task-actions">
                        <a href="/edit-task?id=<?= $task->getId(); ?>" class="btn-secondary">Edit</a>
                        <a class="btn-danger" href="/delete-task?id=<?= $task->getId(); ?>">Deletar</a>
                    </div>
                </div>
                <?php endforeach; ?>

                </div>
            </div>
        </section>
    </main>
</body>
</html>