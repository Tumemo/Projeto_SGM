<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Atualizar Ambientes</title>
</head>
<body style="height: 100dvh; display: flex; justify-content: center; align-items: center;">
    <div class="card w-25 m-auto">
        <h2 class="bg-primary p-2 text-center text-white rounded-top">Atualizar Ambientes</h2>
        <form action="" class="p-3" onsubmit="atualizarAmbiente(event)">
            <div>
                <label for="nome" class="form-label">Novo Nome Ambiente:</label>
                <input id="novoNome" type="text" placeholder="Ex: Sala de Jogos" class="form-control">
            </div>
            <div>
                <label for="bloco" class="form-label">Bloco que ficará o ambiente:</label>
                <select name="" id="bloco" class="form-select">
                    <option value="1">Bloco Administrativo</option>
                    <option value="2">Recepção</option>
                </select>
            </div>
            <button class="btn btn-primary w-100 my-2">Atualizar</button>
        </form>
    </div>
    <script>
        const local = Number(location.search.substring(4,location.search.length))
        async function atualizarAmbiente(evento){
            evento.preventDefault()
            const novoNome = document.getElementById('novoNome').value
            const bloco = document.getElementById('bloco').value
            const id_ambiente = local
            await axios.put('./api/api_ambientes.php',{
                nome: nome,
                id_bloco: id_bloco,
                id_ambiente: id_ambiente
            },{
                header: {"Content-Type": "application/json"}
            }).then((res) => {alert("Sucesso!"), window.location.href = 'http://localhost/2025/sgm/configurar_ambientes.php'}).catch(error => alert("Falhou!"))
        }
    </script>
</body>
</html>