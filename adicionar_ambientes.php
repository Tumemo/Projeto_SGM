<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Adicionar Ambientes</title>
</head>
<body style="height: 100dvh; display: flex; justify-content: center; align-items: center;">
    <div class="card w-25 m-auto">
        <h2 class="bg-primary p-2 text-center text-white rounded-top">Adicionar Ambientes</h2>
        <form action="" class="p-3">
            <div class="mb-2">
                <label for="nome" class="form-label"> Nome Ambiente:</label>
                <input type="text" id="nome" placeholder="Ex: Sala de Jogos" class="form-control">
            </div>
            <div>
                <label for="bloco" class="form-label">Bloco que ficará o ambiente:</label>
                <select name="" id="bloco" class="form-select">
                    <option value="Bloco Administrativo">Bloco Administrativo</option>
                    <option value="Recepção">Recepção</option>
                </select>
            </div>
            <button onclick="adicionarAmbientes(event)" class="btn btn-primary w-100 my-2">Adicionar</button>
        </form>
    </div>
    <script>
        console.log(window.location.href)
        async function adicionarAmbientes(evento) {
            evento.preventDefault()
            const nome = document.getElementById('nome')
            const bloco = document.getElementById('bloco')
            let id_bloco
            if(bloco.value == "Bloco Administrativo"){
                id_bloco = 1
            } else{
                id_bloco = 2
            }
            console.log(nome.value,"\n", bloco.value)
            await axios.post('./api/api_ambientes.php',{
                nome: nome.value,
                id_bloco: id_bloco
            },{
                header: {"Content-Type": "application/json"}
            }).then((res) => {alert("Sucesso!"), window.location.href = 'http://localhost/2025/sgm/configurar_ambientes.php'}).catch(error => alert("Falhou!"))

        }
    </script>
</body>
</html>