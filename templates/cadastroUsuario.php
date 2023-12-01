<?php require_once('templates/cabecalho.php'); ?>

<div class="cadastrar-usuario">
    <h1>Cadastre-se!</h1>
    <form method="post" action="?acao=cadastrar-usuario">
        <div id="">
            <label for="nome" class="sr-only">Nome completo</label>
            <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome completo"
                required autofocus>
            <label class="sr-only">Login</label>
            <input style="width: 300px;" type="text" name="login" class="form-control" placeholder="Login" required
                autofocus>
            <label class="sr-only">Senha</label>
            <input style="width: 300px;" type="password" name="senha" class="form-control" placeholder="Senha" required>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo-usuario" value="rep" id="rep" />
                <label class='form-label' for="adm">Representante</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo-usuario" value="cli" id="cli" />
                <label class='form-label' for="super-adm">Cliente</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </form>
</div>

<?php require_once('templates/rodape.php'); ?>