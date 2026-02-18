<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>SGM - Gestor</title>
</head>
<body>
    <nav class="bg-dark text-white d-flex justify-content-between py-2 px-5">
        <h2 class="">SGM | Gestão Administrativa</h2>
        <div class="d-flex align-items-center gap-2">
            <p class="m-0 border-1 border-end pe-2">Olá, Admin Gestor</p>
            <a href="api/logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </nav>
    <main class="container d-flex flex-column gap-5 mt-3">
        <section class="row gap-4">
            <div class="bg-primary text-white py-2 px-3 w-25 rounded-2 col shadow-lg">
                <p class="fs-4">Novas Solicitações</p>
                <h2>0</h2>
            </div>
            <div class="bg-warning text-white py-2 px-3 w-25 rounded-2 col shadow-lg">
                <p class="fs-4">Em Atendimento</p>
                <h2>0</h2>
            </div>
            <div class="bg-danger text-white py-2 px-3w-25 rounded-2 col shadow-lg">
                <p class="fs-4">Críticos / Urgentes</p>
                <h2>0</h2>
            </div>
        </section>
        <section class="d-flex gap-2 justify-content-center">
            <a href="gestor_chamados.php" class="btn btn-secondary"><i class="bi bi-list-task"></i> Gerenciar Todos os Chamados</a>
            <a href="" class="btn btn-outline-primary"><i class="bi bi-geo-alt"></i> Configurar Ambientes</a>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>