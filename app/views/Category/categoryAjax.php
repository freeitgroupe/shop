<?php if(count($vars)):?>
    <?php foreach($vars as $product):?>
        <!-- single product -->
        <div class="singleProduct clear">
            <div class="hrefBox">
                <a href="<?='/product/' . $product['alias']?>">
                    <div class="thumbnail">
                        <?php if($product['upsell_product'] > 0): ?>
                            <div class="saleNotice">Sale</div>
                        <?php endif;?>
                        <?php if($product['stock_id'] > 0): ?>
                            <div class="stockNotice" id="stock">Stock</div>
                        <?php endif; ?>
                        <img src="<?= PROD_IMG . $product['image']?>" alt="#">
                    </div>
                </a>
                <div class="favBox clear">
                    <div class="favIcon bookmark shoppingPopupWindow" data-product="<?=$product['id']?>">q</div>
                </div>
                <div class="pruductName">
                    <?=$product['title']?>
                </div>
                <div class="procuctPrice">
                    <span class="currency">$</span><?=$product['price']?>
                </div>
            </div>

            <div class="productFooter clear">
                <a href="cart/add?id=<?=$product['id']?>" id="productAdd" class="addToCart button-add" data-id="<?=$product['id']?>">Add to cart</a>
            </div>
        </div>
        <!-- single product end -->
    <?php endforeach?>
<?php endif;?>
