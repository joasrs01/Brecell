<form method="post" action="?acao=inserir-usuario">
    <label for="nome" class="sr-only">Nome completo</label>
    <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome completo" required
        autofocus>
    <label class="sr-only">Nome completo</label>
    <input style="width: 300px;" type="text" name="login" class="form-control" placeholder="Login" required autofocus>
    <label class="sr-only">Senha</label>
    <input style="width: 300px;" type="password" name="senha" class="form-control" placeholder="Senha" required>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo-usuario" value="administrador" id="adm"/>
        <label class='form-label' for="adm">Administrador</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="tipo-usuario" value="super-administrador" id="super-adm"/>
        <label class='form-label' for="super-adm">Super-Administrador</label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
</form>
</body>

</html>