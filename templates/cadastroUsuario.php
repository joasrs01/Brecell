<?php require_once('templates/cabecalho.php');?>

<form method="post" action="?acao=cadastrar-usuario">
    <label for="nome" class="sr-only">Nome completo</label>
    <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome completo" required
        autofocus>
    <label class="sr-only">Nome completo</label>

    <input style="width: 300px;" type="text" name="login" class="form-control" placeholder="Login" required autofocus>
    <label class="sr-only">Senha</label>
    <input style="width: 300px;" type="password" name="senha" class="form-control" placeholder="Senha" required>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo-usuario" value="representante" id="rep"/>
        <label class='form-label' for="adm">Representante</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo-usuario" value="cliente" id="cli"/>
        <label class='form-label' for="super-adm">Cliente</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
</form>
</body>

</html>

<?php require_once('templates/rodape.php');?>