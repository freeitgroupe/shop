
<div class="embraceFull clear indexVideo">
    <div class="embrace indexVideoBox clear">
        <div class="videoSplitter clear">
            <video controls="controls" height="267" poster="video/del.jpg" width="400"><source avc1.42e01e="" src="http://zupplybox.com/video/zupply.mp4" type="video/mp4; codecs=" /> The video tag is not supported by your browser. Update please.. <a href="../video/duel.mp4">Download the video.</a>.</video>
        </div>
        <div class="videoSplitter clear">
            <h2 class="wellCome">Welcome.</h2>
            <a class="button" href="/registration">Create account</a>
        </div>
    </div>
</div>
<!-- slider end -->
<!-- main page content -->

<!-- categories box -->
<div class="embraceFull">
    <div class="embrace clear categoriesIndex">
        <?php if(isset($primary_category) && $primary_category != false):?>
            <?php for($i=1, $count = count($primary_category); $i<=$count; $i++):?>
                <div class="indexSingleCat">
                    <a href="/category/<?=$primary_category[$i]['alias']?>">
                        <img src="<?=CAT_IMG . $primary_category[$i]['image']?>">
                    </a>
                    <div class="nameBox"><?=$primary_category[$i]['title']?></div>
                </div>
            <?php endfor?>
        <?php endif?>
    </div>
</div>
<!-- categories box end -->

<div class="emraceFull">
    <div class="embrace clear indexPage">
        <!-- choice if the day -->
        <div class="choiceIndex clear">
            <div class="choiceHead clear">
                <h3 class="stipeHeading">Choice of the day</h3>
                <div class="refreashBox">
                    <!-- <button id="refreash">
                        Refresh <div class="spinner" id="spin">L</div>
                    </button> -->
                </div>
            </div>
            <div class="choiceLoop clear">
                <?php if($ProductsHomePage != 'demoProducts'): ?>
                    <?php foreach ($ProductsHomePage as $item):?>
                        <!-- single product -->
                        <div class="singleProduct clear">
                            <div class="hrefBox">
                                <a href="<?='/product/' . $item['alias']?>">
                                    <div class="thumbnail">
                                        <?php if($item['upsell_product'] > 0): ?>
                                            <div class="saleNotice">Sale</div>
                                        <?php endif;?>
                                        <?php if($item['stock_id'] > 0): ?>
                                            <div class="stockNotice" id="stock">Stock</div>
                                        <?php endif; ?>
                                        <img src="<?= PROD_IMG . $item['image']?>" alt="#">
                                    </div>
                                </a>
                                <div class="favBox clear">
                                    <div class="favIcon bookmark shoppingPopupWindow" data-product="<?=$item['id']?>">q</div>
                                </div>
                                <div class="pruductName">
                                    <?=$item['title']?>
                                </div>
                                <div class="procuctPrice">
                                    <span class="currency">$</span><?=$item['price']?>
                                </div>
                            </div>
                            <div class="productFooter clear">
                                <a href="cart/add?id=<?=$item['id']?>" id="productAdd" class="addToCart button-add" data-id="<?=$item['id']?>">Add to cart</a>
                            </div>
                        </div>
                        <!-- single product end -->
                    <?php endforeach;?>
                <?php else: ?>
                    <!-- single product -->
                    <div class="singleProduct clear">
                        <a href="#">
                            <div class="hrefBox">
                                <div class="thumbnail">
                                    <img src="images/thumb3.jpg" alt="#">
                                    <div class="saleNotice">Sale</div>
                                    <div class="stockNotice" id="stock">Stock</div>
                                </div>
                                <div class="favBox clear">
                                    <div class="favIcon">q</div>
                                </div>
                                <div class="pruductName">
                                    Coffee stuff for Lovers
                                </div>
                                <div class="procuctPrice">
                                    <span class="currency">$</span>1200
                                </div>
                            </div>
                        </a>
                        <div class="productFooter clear">
                            <input type="button" class="addToCart" id="addToCart" value="Add to cart">
                        </div>
                    </div>
                    <!-- single product end -->
                <?php endif; ?>
            </div>
        </div>
        <!-- choice if the day end-->
        <!-- Benefits -->
        <?=htmlspecialchars_decode($homeContentPage)?>
    </div>
</div>
<!-- main page content end -->