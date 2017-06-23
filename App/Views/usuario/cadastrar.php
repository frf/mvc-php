<div class="row">
    <br>
    <div class="col-md-12">
        <h3>Cadastrar Usuário</h3>
    </div>
    <div class="col-md-12">
        <form action="/usuario/salvar" method="post">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control"  id="senha" name="senha" placeholder="senha ">
            </div>

            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            <a href="/usuario" class="btn btn-info btn-sm">Voltar</a>
        </form>
    </div>
</div>