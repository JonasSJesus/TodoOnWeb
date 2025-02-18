<?php require_once 'Includes/header.php'; ?>

    <main class="container">
        <form class="task-form" method="post">
            <h2>Edit Task</h2>
            <input type="hidden" id="user_id" value="123">
            
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" id="name" name="name" value="<?= $task->name; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"><?= $task->description; ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="due_date">Due Date <span class="todo">Quando atualiza a task, a data reseta!</span></label>
                    <input type="date" id="due_date" name="due_date" >
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority" required>
                        <option value="1" <?= $task->priority === 1 ? 'selected' : ''; ?> >Low</option>
                        <option value="2" <?= $task->priority === 2 ? 'selected' : ''; ?> >Medium</option>
                        <option value="3" <?= $task->priority === 3 ? 'selected' : ''; ?> >High</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="Trabalho" <?= $task->category === "Trabalho" ? 'selected' : ''; ?> >Trabalho</option>
                    <option value="Pessoal" <?= $task->category === "Pessoal" ? 'selected' : ''; ?> >Pessoal</option>
                    <option value="Estudo" <?= $task->category === "Estudo" ? 'selected' : ''; ?> >Estudo</option>
                    <option value="Lazer" <?= $task->category === "Lazer" ? 'selected' : ''; ?> >Lazer</option>
                    <option value="Casa" <?= $task->category === "Casa" ? 'selected' : ''; ?> >Casa</option>
                    <option value="Saude" <?= $task->category === "Saude" ? 'selected' : ''; ?> >Saude</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Update Task</button>
                <a href="/" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>