<?php require_once('templates/cabecalho.php'); ?>

<div class="cadastrar-usuario">
    <h1><?= $bAlteracao ? 'Alteração de produto': 'Cadastro de produto'?></h1>
    <form method="post" action="?acao=<?= $bAlteracao ? 'alterar': 'cadastrar'?>-produto<?= $bAlteracao ? "&id=".$celular['COD_CELULAR'] : '' ?>" enctype="multipart/form-data">
        <div id="">
            <label for="nome" class="sr-only">Nome produto</label>
            <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome produto"
                required autofocus value="<?= $bAlteracao ? $celular['DES_CELULAR']: ''?>">
            <label class="sr-only">Marca</label>
            <select class="form-control" style="width: 300px;" name="marca">
                <?php
                    $arrMarcas = BuscarMarcas();

                    if( count($arrMarcas) > 0 ){
                        foreach( $arrMarcas as $marca ){
                        ?>
                            <option <?=$bAlteracao ? $celular['COD_MARCA'] == $marca['COD_MARCA'] ? 'selected' : '' : ''?> value="<?=$marca['COD_MARCA']?>"><?=$marca['DES_MARCA']?></option>
                        <?php
                        }
                    }
                ?>
            </select>   
            <label class="sr-only">Preço</label>
            <input style="width: 300px;" type="number" name="preco" class="form-control" step=".01" placeholder="Preço" value="<?= $bAlteracao ? $celular['VAL_PRECO']: ''?>" required>
            <label class="sr-only">Imagem</label>
            <input style="width: 300px;" class="form-control" type="file" name="imagem" <?= $bAlteracao ? '': 'required'?>/>
            <button class="btn btn-lg btn-primary btn-block" type="submit"><?= $bAlteracao ? 'Alterar': 'Cadastrar'?></button>
    </form>
</div>

<?php require_once('templates/rodape.php'); ?>