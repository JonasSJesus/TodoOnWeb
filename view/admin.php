    <?php require_once 'header.php'; ?>
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
