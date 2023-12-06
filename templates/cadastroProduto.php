<?php require_once('templates/cabecalho.php'); ?>

<div class="cadastrar-usuario">
    <h1>Cadastro de produto</h1>
    <form method="post" action="?acao=cadastrar-produto" enctype="multipart/form-data">
        <div id="">
            <label for="nome" class="sr-only">Nome produto</label>
            <input style="width: 550px;" type="text" name="nome" class="form-control" placeholder="Nome produto"
                required autofocus>
            <label class="sr-only">Marca</label>
            <div style=" display: flex;">
                <select class="form-control" style="width: 300px;" name="select-marca">
                    <?php
                        $arrMarcas = BuscarMarcas();

                        if( count($arrMarcas) > 0 ){
                            foreach( $arrMarcas as $marca ){
                            ?>
                                <option value="<?=$marca['COD_MARCA']?>"><?=$marca['DES_MARCA']?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
                <input class="btn btn-light" type="button" id="cadastrar-marca" value="Cadastrar Marca" action="index.php?acao=cadastro-marca"/>
            </div>     
            <label class="sr-only">Preço</label>
            <input style="width: 300px;" type="number" name="preco" class="form-control" placeholder="Preço" required>
            <label class="sr-only">Imagem</label>
            <input style="width: 300px;" class="form-control" type="file" name="imagem" required />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </form>
</div>

<?php require_once('templates/rodape.php'); ?>