<div class="row">
    <br>
    <div class="col-md-12">
        <a href="/usuario/cadastrar" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php
            if(!count($aViewVar['aListaUsuario'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum usuário encontrado</div>
        <?php
            } else {
        ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="info">Usuário</td>
                    <td class="info"></td>
                </tr>
                <?php
                    foreach($aViewVar['aListaUsuario'] as $aUsuario) {
                ?>
                    <tr>
                        <td><?php echo $aUsuario['usuario']; ?></td>
                        <td>
                            <a href="/usuario/editar/<?php echo $aUsuario['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                            <a href="/usuario/excluir/<?php echo $aUsuario['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        <?php
            }
        ?>
    </div>
</div>