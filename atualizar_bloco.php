<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Atualizar Bloco</title>
</head>
<body style="height: 100dvh; display: flex; justify-content: center; align-items: center;">
    <div class="card w-25 m-auto">
        <h2 class="bg-primary p-2 text-center text-white rounded-top">Atualizar Bloco</h2>
        <form action="" class="p-3">
            <div>
                <label for="nome" class="form-label">Novo Nome Bloco:</label>
                <input type="text" placeholder="Ex: Recepção" class="form-control">
            </div>
            <div>
                <label for="bloco">Descrição do Bloco:</label>
                <textarea name="bloco" id="bloco" class="form-control" placeholder="Ex: Grande espaço.."></textarea>
            </div>
            <button class="btn btn-primary w-100 my-2">Atualizar</button>
        </form>
    </div>
</body>
</html>