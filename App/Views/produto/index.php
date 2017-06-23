<div class="row">
    <br>
    <div class="col-md-12">
        <a href="/produto/cadastrar" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php
            if(!count($aViewVar['aListaProduto'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
        <?php
            } else {
        ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="info">Nome</td>
                    <td class="info">Valor</td>
                    <td class="info">Data Cadastro</td>
                    <td class="info">Data Validade</td>
                    <td class="info"></td>
                </tr>
                <?php
                    foreach($aViewVar['aListaProduto'] as $aProduto) {
                ?>
                    <tr>
                        <td><?php echo $aProduto['no_produto']; ?></td>
                        <td><?php echo $oUtil::formatMoney($aProduto['vl_produto'],"pt",true); ?></td>
                        <td><?php echo $oUtil::convertDate($aProduto['dt_cadastro'],"d/m/Y"); ?></td>
                        <td><?php echo $oUtil::convertDate($aProduto['dt_validade'],"d/m/Y"); ?></td>
                        <td>
                            <a href="/produto/editar/<?php echo $aProduto['co_produto']; ?>" class="btn btn-info btn-sm">Editar</a>
                            <a href="/produto/excluir/<?php echo $aProduto['co_produto']; ?>" class="btn btn-danger btn-sm">Excluir</a>
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