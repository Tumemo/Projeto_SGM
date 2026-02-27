<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_perfil'] !== 'gestor') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>SGM - Gestão de Chamados</title>
    <style>
        .local {
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
    <main class="container mt-3">
        <h1>Todos os Chamados</h1>
        <button class="btn btn-outline-secondary" onclick="carregarChamados('')">Todos</button>
        <button class="btn btn-outline-primary" onclick="carregarChamados('aberto')">Abertos</button>
        <button class="btn btn-outline-warning" onclick="carregarChamados('em_execucao')">Em Execução</button>
        <button class="btn btn-outline-success" onclick="carregarChamados('concluido')">Concluídos</button>
        <table class="table mt-4 shadow-lg align-middle">
            <thead class="table-dark">
                <th>ID</th>
                <th>Solicitante</th>
                <th>Local / Tipo</th>
                <th>Prioridade</th>
                <th>Técnico</th>
                <th>Status</th>
                <th>Ações</th>
            </thead>
            <tbody id="tabelaGeral">
        
            </tbody>
        </table>
    </main>
    <div class="modal fade" id="modalFoto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0 text-center bg-dark">
                    <img src="" id="imgModal" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verFoto(url) {
            document.getElementById('imgModal').src = url;
            new bootstrap.Modal(document.getElementById('modalFoto')).show();
        }
    </script>
    <script>
        const coresPrioridade = {
            'urgente': 'text-danger',
            'alta': 'text-warning',
            'media': 'text-primary',
            'baixa': 'text-secondary'
        };
        const coresStatus = {
            'aberto': 'bg-secondary',
            'em_execucao': 'bg-warning',
            'concluido': 'bg-success',
            'fechado': 'bg-dark'
        };

        async function carregarChamados(status = '') {
            const res = await fetch(`api/gestor_chamados.php?status=${status}`);
            const chamados = await res.json();
            const body = document.getElementById('tabelaGeral');

            body.innerHTML = chamados.map(c => `
                <tr>
                    <td>#${c.id_chamado}</td>
                    <td>${c.nome_usuario}</td>
                    <td>
                        <small class="text-muted">${c.nome}</small><br>
                        <strong>${c.nome_ambiente}</strong>
                    </td>
                    <td><i class="bi bi-circle-fill ${coresPrioridade[c.prioridade]} me-1"></i> ${c.prioridade.toUpperCase()}</td>
                    <td>${c.nome_tecnico || '<em class="text-muted">Não atribuído</em>'}</td>
                    <td><span class="badge ${coresStatus[c.status]}">${c.status.replace('_', ' ').toUpperCase()}</span></td>
                    <td>
                        <a href="gestor_detalhes.php?id=${c.id_chamado}" class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> Gerenciar
                        </a>
                    </td>
                </tr>
            `).join('');
        }

        carregarChamados();
    </script>
</body>

</html>