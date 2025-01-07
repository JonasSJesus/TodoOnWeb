<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App - Minha Conta</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>To Do App</h1>
    </header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="user.html">Minha Conta</a></li>
            <li><a href="login.html">Login/Cadastro</a></li>
            <li><a href="admin.html">Admin</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Minha Conta</h2>
        <h3>Adicionar Nova Tarefa</h3>
        <form action="home.php" method="get">
            <input type="text" name="description" placeholder="Descrição da Tarefa" required>
            <input type="date" name="creation_date" required>
            <input type="date" name="completion_date" required>
            <select name="priority" required>
                <option value="">Selecione a Prioridade</option>
                <option value="1">1 - Baixa</option>
                <option value="2">2 - Média</option>
                <option value="3">3 - Alta</option>
            </select>
            <select name="category" required>
                <option value="">Selecione a Categoria</option>
                <option value="trabalho">Trabalho</option>
                <option value="pessoal">Pessoal</option>
                <option value="estudo">Estudo</option>
                <option value="lazer">Lazer</option>
                <option value="saude">Saúde</option>
            </select>
            <input type="submit" value="Adicionar Tarefa">
        </form>

        <h3>Minhas Tarefas</h3>
        <div class="task">
            <h3>Tarefa 1</h3>
            <p><strong>Descrição:</strong> Completar relatório mensal</p>
            <p><strong>Data de Criação:</strong> 01/05/2023</p>
            <p><strong>Data de Conclusão:</strong> 10/05/2023</p>
            <p><strong>Prioridade:</strong> 2</p>
            <p><strong>Categoria:</strong> Trabalho</p>
        </div>
        <div class="task">
            <h3>Tarefa 2</h3>
            <p><strong>Descrição:</strong> Fazer compras no supermercado</p>
            <p><strong>Data de Criação:</strong> 03/05/2023</p>
            <p><strong>Data de Conclusão:</strong> 05/05/2023</p>
            <p><strong>Prioridade:</strong> 1</p>
            <p><strong>Categoria:</strong> Pessoal</p>
        </div>
    </div>
</body>
</html>
