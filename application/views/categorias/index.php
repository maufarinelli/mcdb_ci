<nav>
    <ul>
        <li><a href="">Banho e toilete</a></li>
        <li><a href="">Higiene e Cuidados</a></li>
        <li><a href="">Hora da refeiçao</a></li>
        <li><a href="">Mamadeiras, Chupeta e Acessorios</a></li>
        <li><a href="">Brinquedos</a></li>
        <li><a href="">Quarto</a></li>
        <li><a href="">Passeio</a></li>
        <li><a href="">Roupinhas</a></li>
        <li><a href="">Atividades e Brincadeiras</a></li>
        <li><a href="">Equipamentos para o bebê</a></li>
        <li><a href="">Segurança em casa</a></li>
        <li><a href="">Para o carro</a></li>
        <li><a href="">Carrinho de bebê</a></li>
        <li><a href="">Fraldas</a></li>
        <li><a href="">Para a mamae</a></li>
    </ul>
</nav>

<?php foreach ($aSubCategoryCompareProducts as $subCatName => $aProducts): ?>
    
    <h2 style="padding: 10px; background: green"><?php echo $subCatName; ?></h2>
    
    <?php foreach ($aProducts as $key => $aProductValues): ?>
            <div style="width:200px; height: 500px; float:left; border: 1px #ccc solid; margin: 10px; padding: 10px;">
                <h3><?php echo $aProductValues['product_name']; ?></h3>
                <img src="<?php echo $aProductValues['product_image']; ?>" alt="<?php echo $aProductValues['product_name']; ?>" />
                
                <?php $i = 0; ?>
                <?php foreach ($aProductValues['product_offers'] as $value): ?>
                    <?php if($i == 4) break; ?>
                    <p><a href="<?php echo $value['link']; ?>" target="_blank"><?php echo $value['store'] . ': ' . $value['price'] ?></a><br />
                    Avaliaçao do Ebit: <?php echo $value['ebit']; ?></p>
                    <?php $i++; ?>
                <?php endforeach ?>
            </div>
    <?php endforeach ?>

<?php endforeach ?>

<div style="clear: both"></div>

<?php foreach ($aSubCategoryOffers as $subCatName => $aProducts): ?>
    
    <h2 style="padding: 10px; background: green"><?php echo $subCatName; ?></h2>

    <?php foreach ($aProducts as $key => $aProductValues): ?>
            <div style="width:200px; height: 320px; float:left; border: 1px #ccc solid; margin: 10px; padding: 10px;">
                <h3><?php echo $aProductValues['product_name']; ?></h3>
                <img src="<?php echo $aProductValues['product_image']; ?>" alt="<?php echo $aProductValues['product_name']; ?>" />
                
                <p><a href="<?php echo $aProductValues['link']; ?>" target="_blank"><?php echo $aProductValues['store'] . ': ' . $aProductValues['price'] ?></a><br />
                Avaliaçao do Ebit: <?php echo $aProductValues['ebit']; ?></p>
            </div>
    <?php endforeach ?>
    <div style="clear: both"></div>
<?php endforeach ?>





    <?php /*print_r(count($aSubCategory)); ?>

    <?php foreach($aSubCategory as $name => $aProducts): ?>
        <h3><?php echo $name; ?></h3>
            
            <?php foreach($aProducts as $product): ?>
                

                <?php if($product->productName): ?>
                    <div style='width:200px; float:left; margin-right:20px; border: 1px solid #ccc;'>
                        <a href="<?php echo $product->links->link[1]->attributes()->url . "#precos"; ?>"><img src='<?php echo $product->thumbnail->attributes()->url; ?>'
                        <h3><?php echo $product->productName; ?></h3>
                        <p>A partir de <?php echo $product->priceMin; ?></p>
                        <button>Saiba mais</button></a>
                    </div>
                <?php else: ?>
                    <div style='width:200px; float:left; margin-right:20px; border: 1px solid #ccc;'>
                        <a href="<?php echo $product->links->link->attributes()->url; ?>"><img src='<?php echo $product->thumbnail->attributes()->url; ?>'
                        <h3><?php echo $product->offerName; ?></h3>
                        <p>A partir de <?php echo $product->price->value; ?></p>
                        <button>Saiba mais</button></a>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
    
    <?php endforeach;*/  ?>

