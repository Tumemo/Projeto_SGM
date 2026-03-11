<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Configurar Usuários</title>
</head>
<body>
    <nav class="bg-dark text-white d-flex justify-content-between py-2 px-5">
        <h2 class="">SGM | Gestão Administrativa</h2>
        <div class="d-flex align-items-center gap-2">
            <p class="m-0 border-1 border-end pe-2">Olá, Admin Gestor</p>
            <a href="gestor_dashboard.php" class="border-1 border-end pe-2 text-decoration-none btn btn-outline-light">Voltar</a>
            <a href="api/logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </nav>
    <main class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="my-4">Todos os Usuários</h2>
            <a href="adicionar_usuario.php" class="btn btn-success"><i class="bi bi-plus"></i>Novo Usuário</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nome do Usuário</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Data Criação</th>
                <th>Ações</th>
            </thead>
            <tbody class="align-middle">
                <tr>
                    <td>#1</td>
                    <td>Hugo</td>
                    <td>hugo@sgm.com</td>
                    <td>Gestor</td>
                    <td>2025-07-23</td>
                    <td>
                        <a href="atualizar_usuario.php" class="btn btn-primary"><i class="bi bi-pencil-square me-2"></i>Atualizar</a>
                        <button class="btn btn-danger"><i class="bi bi-trash3 me-2"></i>Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>