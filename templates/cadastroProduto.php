<?php require_once('templates/cabecalho.php'); ?>

<div class="cadastrar-usuario">
    <h1>Cadastro de produto</h1>
    <form method="post" action="?acao=cadastrar-produto" enctype="multipart/form-data">
        <div id="">
            <label for="nome" class="sr-only">Nome produto</label>
            <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome produto"
                required autofocus>
            <label class="sr-only">Marca</label>
            <input style="width: 300px;" type="text" name="marca" class="form-control" placeholder="Marca" required
                autofocus>
            <label class="sr-only">Preço</label>
            <input style="width: 300px;" type="number" name="preco" class="form-control" placeholder="Preço" required>
            <label class="sr-only">Imagem</label>
            <input class="form-control" type="file" name="imagem" required/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </form>
</div>

<?php require_once('templates/rodape.php'); ?>