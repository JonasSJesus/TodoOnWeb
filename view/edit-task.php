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
                    <label for="due_date">Due Date</label>
                    <input type="date" id="due_date" value="2024-03-20" required>
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" required>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high" selected>High</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" required>
                    <option value="work" selected>Work</option>
                    <option value="personal">Personal</option>
                    <option value="shopping">Shopping</option>
                    <option value="other">Other</option>
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