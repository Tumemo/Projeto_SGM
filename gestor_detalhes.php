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
    <main class="container">
        <a href="" class="btn btn-outline-secondary mb-4">Voltar</a>
        <div class="d-flex justify-content-between">
            <div class="card shadow-lg " style="width: 65%;">
                <p class="card-title border-bottom p-2"><strong>Dados da Solicitação</strong></p>
                <div class="p-2">
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
                </div>
            </div>
            <div class="card shadow-lg h-25 rounded border-primary border-2" style="width: 30%;">
                <p class="card-title border-bottom p-2 bg-primary text-white"><strong>Triagem e Atribuição</strong></p>
                <div class="p-3">
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="Tecnico">Técnico Responsável</label>
                        <select name="" id="Tecnico" class="p-1 rounded border">
                            <option value="João Técnico">João Técnico</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="Prioridade">Prioridade</label>
                        <select name="" id="Prioridade" class="p-1 rounded border">
                            <option value="Alta">Alta</option>
                            <option value="Médio">Médio</option>
                            <option value="Baixo">Baixo</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label class="mb-1" for="data">Data Prevista</label>
                        <input type="date" class="p-1 rounded border">
                    </div>
                    <button class="btn btn-primary w-100">Confirmar Atribuição</button>
                </div>
            </div>
        </div>
        <button class="btn btn-warning mt-3" style="width: 65%;">Reabrir Chamado</button>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>