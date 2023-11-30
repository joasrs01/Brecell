<?php require('templates/cabecalho.php');?>

<form method="post" action="?acao=acessar">
    <div>
        <h1 class="h3 mb-3 font-weight-normal"></h1>
        <label class="sr-only">Login</label>
        <input style="width: 300px;" type="text" name="login" class="form-control" placeholder="Login" required
            autofocus>
        <label class="sr-only">Senha</label>
        <input style="width: 300px;" type="password" name="senha" class="form-control" placeholder="Senha"
            required>
        <button class="btn btn-primary" type="submit">Acessar</button>
        <a class="btn btn-primary" href="index.php?acao=novo-usuario">Cadastrar</a>
    </div>
</form>

<?php require('templates/rodape.php');?>