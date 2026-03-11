<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Adicionar Usuário</title>
</head>
<body style="height: 100dvh; display: flex; justify-content: center; align-items: center;">
    <div class="card w-25 m-auto">
        <h2 class="bg-primary p-2 text-center text-white rounded-top">Adicionar Usuário</h2>
        <form action="" class="p-3">
            <div class="mb-2">
                <label for="nome" class="form-label"> Nome:</label>
                <input type="text" placeholder="Ex: Hugo" class="form-control">
            </div>
            <div class="mb-2">
                <label for="nome" class="form-label"> E-mail:</label>
                <input type="email" placeholder="Ex: exemplo@exemplo.com" class="form-control">
            </div>
            <div class="mb-2">
                <label for="nome" class="form-label"> Senha:</label>
                <input type="password" placeholder="Ex: exemplo123" class="form-control">
            </div>
            <div class="mb-2">
                <label for="bloco" class="form-label"> Perfil:</label>
                <select name="" id="bloco" class="form-select">
                    <option value="solicitante">Solicitante</option>
                    <option value="gestor">Gestor</option>
                    <option value="tecnico">Tecnico</option>
                </select>
            </div>
            
            <button class="btn btn-primary w-100 my-2">Adicionar</button>
        </form>
    </div>
</body>
</html>