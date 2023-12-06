<?php require_once('templates/cabecalho.php');?>

<div class="corpo">
    <h2>Catálogo</h2>
    <?php
    $arrCelulares = BuscarCelulares();
    if (count($arrCelulares) > 0) {
        foreach ($arrCelulares as $celular) {
            ?>
            <div class="div-celular">
                <ul>
                    <li id="nome-item">
                        <?= $celular['DES_MARCA'] . ' ' . $celular['DES_CELULAR'] ?>
                    </li>
                    <li><img src="<?= $celular['CAM_IMAGEM'] ?>" alt="imagem" /></li>
                    <li id="valor-item">
                        R$ <?=(double)$celular['VAL_PRECO'] ?>
                    </li>
                    <li><input id="<?= $celular['COD_CELULAR'] ?>" class="btn btn-primary" class="adicionar-carrinho" type="button" value="+ Carrinho" /></li>
                    <?php
                        if(UsuarioLogado() && UsuarioRepresentante()){
                        ?>
                            <li><a class="btn btn-danger excluir-item" href="?acao=remover-celular&id=<?= $celular['COD_CELULAR'] ?>">Excluir</a></li>
                            <li><a class="btn btn-secondary editar-item" href="?acao=editar-celular&id=<?= $celular['COD_CELULAR'] ?>">Editar</a></li>
                        <?php
                        }
                    ?>
                </ul>
            </div>
            <?php
        }
    }
    ?>
</div>

<?php require_once('templates/rodape.php');?>