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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Configurar Ambientes</title>
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
            <h2 class="my-4">Todos os Ambientes</h2>
            <a href="adicionar_ambientes.php" class="btn btn-success"><i class="bi bi-plus"></i>Novo Ambiente</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nome Ambiente</th>
                <th>Nome do Bloco</th>
                <th>Ações</th>
            </thead>
            <tbody class="align-middle tbody">
            </tbody>
        </table>
    </main>
    <script>
        async function carregarAmbientes() {
            let dados = await axios.get('./api/api_ambientes.php')
             .then(res => res.data.data) || []
             .catch(error => console.log("Erro ao consumir api "+error))
    
            const tabela = document.querySelector('.tbody')
            tabela.innerHTML = `
                ${dados.map(dado =>
                    `
                    <tr>
                        <td>#${dado.id_ambiente}</td>
                        <td>${dado.nome}</td>
                        <td>${dado.nome_bloco}</td>
                        <td>
                            <a href="atualizar_ambientes.php?id=${dado.id_ambiente}" class="btn btn-primary"><i class="bi bi-pencil-square me-2"></i>Atualizar</a>
                            <button class="btn btn-danger" onClick="apagarAmbiente(${dado.id_ambiente})"><i class="bi bi-trash3 me-2"></i>Deletar</button>
                        </td>
                    </tr>
                    `
                ).join('')}
            `
        }
        async function apagarAmbiente(id_ambiente) {
            await axios.delete('./api/api_ambientes.php',{
                data: {id_ambiente: id_ambiente},
                headers: {"Content-Type": "application/json"}
            }
            )
            carregarAmbientes()
        }
        carregarAmbientes()
    </script>
</body>
</html>