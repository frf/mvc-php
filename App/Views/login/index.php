<form class="form-signin" method="POST" action="/login/entrar">
    <h2 class="form-signin-heading"></h2>
    <label for="usuario" class="sr-only">Usuário</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
    <label for="senha" class="sr-only">Senha</label>
    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <a href="/login/cadastrar" class="btn btn-lg btn-info btn-block">Cadastre-se</a>
</form>