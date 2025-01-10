    <?php include_once 'Includes/header.php'; ?>
    <main class="container">
        <h2>Editar Tarefa</h2>
        <form action="index.html" method="get">
            <div>
                <label for="task-id">ID da Tarefa:</label>
                <input type="text" id="task-id" name="task-id" value="1" readonly>
            </div>
            <div>
                <label for="description">Descrição:</label>
                <input type="text" id="description" name="description" value="Completar relatório mensal" required>
            </div>
            <div>
                <label for="creation-date">Data de Criação:</label>
                <input type="date" id="creation-date" name="creation_date" value="2023-05-01" required>
            </div>
            <div>
                <label for="completion-date">Data de Conclusão:</label>
                <input type="date" id="completion-date" name="completion_date" value="2023-05-10" required>
            </div>
            <div>
                <label for="priority">Prioridade:</label>
                <select id="priority" name="priority" required>
                    <option value="1">1 - Baixa</option>
                    <option value="2" selected>2 - Média</option>
                    <option value="3">3 - Alta</option>
                </select>
            </div>
            <div>
                <label for="category">Categoria:</label>
                <select id="category" name="category" required>
                    <option value="trabalho" selected>Trabalho</option>
                    <option value="pessoal">Pessoal</option>
                    <option value="estudo">Estudo</option>
                    <option value="lazer">Lazer</option>
                    <option value="saude">Saúde</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Salvar Alterações">
                <a href="index.html" class="button">Cancelar</a>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2023 To Do App. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
