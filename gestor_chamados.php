<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>SGM - Gestão de Chamados</title>
    <style>
        th{
            background-color: #edededff !important;
        }
        .local{
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <nav class="bg-dark text-white d-flex justify-content-between py-2 px-5">
        <h2 class="">SGM Admin</h2>
        <div class="d-flex align-items-center gap-2">
            <p class="m-0 border-1 border-end pe-2">Chamados</p>
            <p class="m-0 border-1 border-end pe-2">Locais</p>
            <a href="api/logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </nav>
    <main class="container">
        <h1>Todos os Chamados</h1>
        <button class="btn btn-outline-secondary">Todos</button>
        <button class="btn btn-outline-primary">Abertos</button>
        <button class="btn btn-outline-warning">Em Execução</button>
        <button class="btn btn-outline-success">Concluídos</button>
        <table class="table mt-4 shadow-lg align-middle">
            <thead>
                <th>ID</th>
                <th>Solicitante</th>
                <th>Local / Tipo</th>
                <th>Prioridade</th>
                <th>Técnico</th>
                <th>Status</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <tr>
                    <td>#1</td>
                    <td>Maria Solicitante</td>
                    <td class="local">Bloco Administrativo <br><strong>Recepção</strong></td>
                    <td><i class="bi bi-circle-fill text-warning"></i> ALTA</td>
                    <td>João Técnico</td>
                    <td><span class="bg-dark text-white rounded w-100 h-100 p-1">Fechado</span></td>
                    <td><span class="bg-primary text-white rounded w-100 h-100 p-1"><i class="bi bi-eye"></i> Gerenciar</span></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>