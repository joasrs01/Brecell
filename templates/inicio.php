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
                        <?= $celular['VAL_PRECO'] ?>
                    </li>
                    <li><input id="adicionar-carrinho" type="button" value="+ Carrinho" /></li>
                </ul>
            </div>
            <?php
        }
    }
    ?>
</div>