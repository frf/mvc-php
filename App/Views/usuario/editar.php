<div class="row">
    <br>
    <div class="col-md-12">
        <h3>Editar Produto</h3>
    </div>
    <div class="col-md-12">
        <form action="/usuario/atualizar" method="post">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $aViewVar['aUsuario']['id']; ?>">

            <div class="form-group">
                <label for="no_produto">Usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" value="<?php echo $aViewVar['aUsuario']['usuario']; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="" value="<?php echo $oUtil::hash($aViewVar['aUsuario']['senha'],true); ?>">
            </div>

            <div class="form-group">
                <label for="senha">Perfil</label>
                <select name="perfil"  class="form-control">
                    <option value="A" <?php echo ($aViewVar['aUsuario']['perfil'] == "A") ? "selected='selected'" : ""; ?>>Admin</option>
                    <option value="U" <?php echo ($aViewVar['aUsuario']['perfil'] == "U") ? "selected='selected'" : ""; ?>>Usuário</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            <a href="/produto" class="btn btn-info btn-sm">Voltar</a>
        </form>
    </div>
</div>