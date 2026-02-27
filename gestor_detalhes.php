<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>SGM - Detalhes Chamados</title>
    <style>
        hr{
            margin: 0.3rem 0;
        }
    </style>
</head>
<body>
    <main class="container mt-4">
        <a href="gestor_chamados.php" class="btn btn-outline-secondary mb-4">Voltar</a>
        <div class="d-flex justify-content-between">
            <div class="card shadow-lg"  style="width: 65%;">
                <p class="card-title border-bottom p-2"><strong>Dados da Solicitação</strong></p>
                <div class="p-2 card-body" id="detalhesChamado">
                    Carregando...
                </div>
                <div id="areaFechamento">

                </div>
                <!-- <div class="p-2">
                    <p><strong>Status:</strong> <span class="bg-secondary text-white rounded w-100 h-100 p-1">Fechado</span></p>
                    <p><strong>Descriçao:</strong> Vazando água na lampada</p>
                    <p><strong>Local:</strong> Bloco Administrativo - Recepção</p>
                    <p><strong>Solicitante:</strong> Maria Solicitante</p>
                    <p><strong>Abertura:</strong> 04/02/2026, 07:25:37</p>
                    <hr>
                    <p><strong>Evidências: </strong></p>
                    <div>
                        <img height="200px" src="http://github.com/Tumemo.png" alt="foto">
                        <p>Abertura</p>
                    </div>
                </div> -->
            </div>
            <form id="formAtribuir" class="card shadow-lg h-25 rounded border-primary border-2" style="width: 30%;">
                <input type="hidden" id="id_chamado" value="<?= $id ?>">
                <p class="card-title border-bottom p-2 bg-primary text-white"><strong>Triagem e Atribuição</strong></p>
                <div class="p-3">
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="Tecnico">Técnico Responsável</label>
                        <select name="" id="selectTecnico" class="p-1 rounded border">
                            <option value="João Técnico">João Técnico</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="Prioridade">Prioridade</label>
                        <select name="" id="prioridade" class="p-1 rounded border">
                            <option value="Baixo">Urgente</option>
                            <option value="Alta">Alta</option>
                            <option value="Médio">Médio</option>
                            <option value="Baixo">Baixo</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="data">Data Prevista</label>
                        <input type="date" class="p-1 rounded border" id="data_prevista">
                    </div>
                    <button class="btn btn-primary w-100">Confirmar Atribuição</button>
                </div>
            </form>
        </div>
        <button class="btn btn-warning mt-3" style="width: 65%;">Reabrir Chamado</button>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function verFoto(url) {
            document.getElementById('imgModal').src = url;
            new bootstrap.Modal(document.getElementById('modalFoto')).show();
        }

        async function carregarDados() {
            // Carrega Técnicos
            const resTec = await fetch('api/usuarios.php');
            const tecnicos = await resTec.json();
            const select = document.getElementById('selectTecnico');
            select.innerHTML = '<option value="">Selecione um técnico...</option>';
            tecnicos.forEach(t => select.innerHTML += `<option value="${t.id_usuario}">${t.nome}</option>`);

            // Carrega Chamado
            const c = await (await fetch(`api/chamados.php?id=<?= $id ?>`)).json();
            document.getElementById('detalhesChamado').innerHTML = `
                <p><strong>Status:</strong> <span class="badge bg-secondary">${c.status.toUpperCase()}</span></p>
                <p><strong>Descrição:</strong> ${c.descricao_problema}</p>
                <p><strong>Local:</strong> ${c.bloco_nome} - ${c.ambiente_nome}</p>
                <p><strong>Solicitante:</strong> ${c.solicitante_nome}</p>
                <p><strong>Abertura:</strong> ${new Date(c.data_abertura).toLocaleString()}</p>
                <div id="fotosContainer"></div>
            `;

            if(c.id_tecnico) document.getElementById('selectTecnico').value = c.id_tecnico;
            if(c.prioridade) document.getElementById('prioridade').value = c.prioridade;
            if(c.data_previsao_conclusao) document.getElementById('data_prevista').value = c.data_previsao_conclusao;

            // Carrega Fotos
            const anexos = await (await fetch(`api/anexos.php?id_chamado=<?= $id ?>`)).json();
            if(anexos.length > 0) {
                let htmlFotos = '<hr><h6>Evidências:</h6><div class="row">';
                anexos.forEach(arq => {
                    htmlFotos += `
                        <div class="col-4 text-center mb-2">
                            <img src="${arq.caminho_arquivo}" class="thumb-img" onclick="verFoto('${arq.caminho_arquivo}')">
                            <small class="text-muted">${arq.tipo_anexo === 'abertura' ? 'Abertura' : 'Conclusão'}</small>
                        </div>`;
                });
                document.getElementById('fotosContainer').innerHTML = htmlFotos + '</div>';
            }

            // Botões de Status
            const area = document.getElementById('areaFechamento');
            if (c.status === 'concluido') {
                area.innerHTML = `<div class="alert alert-success">
                    <h6>Técnico finalizou:</h6><p>${c.solucao_tecnica || 'Sem descrição'}</p>
                    <button onclick="alterarStatusOS(<?= $id ?>, 'fechar')" class="btn btn-success w-100">Fechar O.S.</button>
                </div>`;
            } else if (c.status === 'fechado') {
                area.innerHTML = `<button onclick="alterarStatusOS(<?= $id ?>, 'reabrir')" class="btn btn-warning w-100">Reabrir Chamado</button>`;
            }
        }

        async function alterarStatusOS(id, acao) {
            if(!confirm("Confirmar alteração de status?")) return;
            const res = await fetch('api/gestor_acoes.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id_chamado: id, acao: acao })
            });
            if((await res.json()).success) location.reload();
        }

        document.getElementById('formAtribuir').onsubmit = async (e) => {
            e.preventDefault();
            const res = await fetch('api/atribuir_chamado.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    id_chamado: <?= $id ?>,
                    id_tecnico: document.getElementById('selectTecnico').value,
                    prioridade: document.getElementById('prioridade').value,
                    data_prevista: document.getElementById('data_prevista').value
                })
            });
            if((await res.json()).success) window.location.href = 'gestor_chamados.php';
        };

        carregarDados();
    </script>
</body>
</html>