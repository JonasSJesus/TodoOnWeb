<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App - Administração</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <h1>To Do App - Administração</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/user">Minha Conta</a></li>
            <li><a href="/login">Login/Cadastro</a></li>
            <li><a href="/admin">Admin</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Gerenciar Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php foreach($users as $user): ?>
            <tbody>
                <tr>
                <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td>
                        <a href="#">Editar</a> |
                        <a href="#">Excluir</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

        <h2>Gerenciar Tarefas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Usuário</th>
                    <th>Data de Criação</th>
                    <th>Data de Conclusão</th>
                    <th>Prioridade</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Completar relatório mensal</td>
                    <td>João Silva</td>
                    <td>01/05/2023</td>
                    <td>10/05/2023</td>
                    <td>2</td>
                    <td>Trabalho</td>
                    <td>
                        <a href="#">Editar</a> |
                        <a href="#">Excluir</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Fazer compras no supermercado</td>
                    <td>Maria Santos</td>
                    <td>03/05/2023</td>
                    <td>05/05/2023</td>
                    <td>1</td>
                    <td>Pessoal</td>
                    <td>
                        <a href="edit-task.html">Editar</a> |
                        <a href="#">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
