<?php require_once('templates/cabecalho.php'); ?>

<div class="cadastrar-marca">
    <h1>Cadastro de marca</h1>
    <form method="post" action="?acao=cadastrar-marca">
        <label for="descricao" class="sr-only">Descrição marca</label>
        <input style="width: 550px;" type="text" name="descricao" class="form-control" placeholder="Descrição marca"
            required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </form>
</div>

<?php require_once('templates/rodape.php'); ?>