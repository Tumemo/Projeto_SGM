<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>SGM - Meus Chamados</title>
</head>
<body>
    <nav class="bg-primary text-white d-flex justify-content-between py-2 px-5">
        <h2 class="">SGM - Painel do Solicitante</h2>
        <div class="d-flex align-items-center gap-2">
            <p class="m-0 border-1 border-end pe-2">Olá, Maria Solicitante</p>
            <a href="api/logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </nav>
    <main class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Minhas Solicitações</h1>
            <a href="solicitante_abrir_chamado.php" class="btn btn-success"><i class="bi bi-plus"></i>Nova Solicitação</a>
        </div>
        <table class="table shadow-lg mt-4">
            <thead>
                <th>ID</th>
                <th>Foto</th>
                <th>Local</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Status</th>
            </thead>
            <tbody id="tabelaChamados">
                <tr>
                    <td>#1</td>
                    <td><img src="#" alt="Foto"></td>
                    <td>Bloco Administrativo - Recepção</td>
                    <td>Vazando água da lampada...</td>
                    <td>04/02/2026</td>
                    <td><span class="bg-dark text-white rounded w-100 h-100 p-1">Fechado</span></td>
                </tr>
            </tbody>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
         function verFoto(url) {
            document.getElementById('imgModal').src = url;
            new bootstrap.Modal(document.getElementById('modalFoto')).show();
        }

        async function carregarChamados() {
            const chamados = await (await fetch('api/chamados.php')).json();
            const lista = document.getElementById('tabelaChamados');
            const cores = { 'aberto': 'bg-secondary', 'agendado': 'bg-info', 'em_execucao': 'bg-warning', 'concluido': 'bg-success', 'fechado': 'bg-dark' };

            lista.innerHTML = await Promise.all(chamados.map(async c => {
                // Busca se tem foto para mostrar miniatura na lista
                const anexos = await (await fetch(`api/anexos.php?id_chamado=${c.id_chamado}`)).json();
                const thumbHtml = anexos.length > 0 ?
                    `<img src="${anexos[0].caminho_arquivo}" class="mini-thumb" onclick="verFoto('${anexos[0].caminho_arquivo}')">` :
                    '<i class="bi bi-image text-muted"></i>';

                return `<tr>
                    <td>#${c.id_chamado}</td>
                    <td>${thumbHtml}</td>
                    <td>${c.bloco_nome} - ${c.ambiente_nome}</td>
                    <td>${c.descricao_problema.substring(0,30)}...</td>
                    <td>${new Date(c.data_abertura).toLocaleDateString()}</td>
                    <td><span class="badge ${cores[c.status]}">${c.status.toUpperCase()}</span></td>
                </tr>`;
            })).then(rows => rows.join(''));
        }
        carregarChamados();
    </script>
</body>
</html>