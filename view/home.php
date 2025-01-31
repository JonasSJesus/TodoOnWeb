    <?php include_once 'Includes/header.php'; ?>

    <?php if (isset($_SESSION['register'])): ?>
        <script>
            Swal.fire({
                title: "<?= $_SESSION['register']; ?>",
                icon: "success",
                draggable: true
            });
        </script>
        <?php unset($_SESSION['register']); ?>
    <?php endif; ?>

    <div class="container">
        <h2>Lista de Tarefas</h2>
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
