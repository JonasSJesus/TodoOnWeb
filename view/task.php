    <?php include_once 'Includes/header.php'; ?>
    <div class="container">
        <h2>Minha Conta</h2>
        <h3>Adicionar Nova Tarefa</h3>
        <form method="post">
            <label for="description">Descrição da Tarefa:</label>
            <input type="text" name="description" required>
            
            <label for="completion_date">Data de conclusão limite (Deixe vazio para não adicionar data limite):</label>
            <input type="date" name="completion_date">

            <label for="priority">Selecione a prioridade:</label>
            <select name="priority" required>
                <option value="1">1 - Baixa</option>
                <option value="2">2 - Média</option>
                <option value="3">3 - Alta</option>
            </select>

            <label for="category">Selecione a categoria:</label>
            <select name="category" required>
                <option value="Trabalho">Trabalho</option>
                <option value="Pessoal">Pessoal</option>
                <option value="Estudo">Estudo</option>
                <option value="Lazer">Lazer</option>
                <option value="Casa">Casa</option>
                <option value="Saude">Saúde</option>
            </select>
            <input type="submit" value="Adicionar Tarefa">
        </form>

        <h3>Minhas Tarefas</h3>

        <?php foreach ($tasks as $task): ?>
        <div class="task">
            <h3><?= $task->name; ?></h3>
            <p><strong>Descrição: </strong><?= $task->description; ?></p>
            <p><strong>Data de Criação: </strong><?= $task->created_at; ?></p>
            <p><strong>Data de Conclusão: </strong><?= $task->due_date; ?></p>
            <p><strong>Prioridade: </strong><?= $task->priority; ?></p>
            <p><strong>Categoria: </strong><?= $task->category; ?></p>
        </div>
        <?php endforeach; ?>
        <div class="task">
            <h3>Tarefa Teste</h3>
            <p><strong>Descrição: </strong>Comprar: Arroz, Feijão, Massa, Miojo, Carne Moída</p>
            <p><strong>Data de Criação:</strong> 03/05/2023</p>
            <p><strong>Data de Conclusão:</strong> 05/05/2023</p>
            <p><strong>Prioridade:</strong> 1</p>
            <p><strong>Categoria:</strong> Pessoal</p>
        </div>
    </div>
</body>
</html>
