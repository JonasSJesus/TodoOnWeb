    <?php require_once 'Includes/header.php'; ?>

    <main class="container">
        <form class="task-form" method="post">
            <h2>Add New Task</h2>
            <input type="hidden" id="user_id" value="123">
            
            <div class="form-group">
                <label for="name">Task Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" rows="4" name="description"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="due_date">Due Date (Se for necessário)</label>
                    <input type="date" id="due_date" name="due_date">
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority" required>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="Trabalho">Trabalho</option>
                    <option value="Pessoal">Pessoal</option>
                    <option value="Estudo">Estudo</option>
                    <option value="Lazer">Lazer</option>
                    <option value="Casa">Casa</option>
                    <option value="Saude">Saude</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Create Task</button>
                <a href="/" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>