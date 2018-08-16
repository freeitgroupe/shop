    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" itemscope="" itemtype="http://schema.org/WebPage">
    <head>
        <base href="/">
        <meta http-equiv="content-type" content="text/plain; charset=utf-8" />
        <meta name="csrf-token" content="">
        <!--title-->
        <?=$this->getMeta();?>
        <!--twitter header-->
        <meta name="google-site-verification" content=""/>
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@" />
        <meta name="twitter:creator" content="@elegantcode" />
        <!--facebook header-->
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="" />
        <meta property="og:url" content="" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        <!--gefault header-->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!--include header-->
        <!--    <link rel="stylesheet" href="/css/main.css">;-->
        <link rel="stylesheet" href="/css/main_mob_new.css">
        <link rel="stylesheet" href="/css/jquery-ui.css">
        <link rel="stylesheet" href="/css/jquery-ui.theme.css">
        <link rel="stylesheet" href="/css/the-modal.css">
        <link rel="stylesheet" href="/images/font-awesome/css/font-awesome.min.css">
        <!--shortcut icon-->
        <link rel="shortcut icon" href="/images/favicon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#2b5797">
        <meta name="theme-color" content="#ffffff">
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/functions.js"></script>
        <script src="/js/accounting.js"></script>    <!--accounting -->
        <script src="/js/jquery-ui.js"></script>    <!--for search -->
        <script src="/js/rating.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Roboto:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="/js/jquery.md5.js"></script>
        <script src="/js/jquery.the-modal.js"></script>
        <style>
            .img-list{
                max-width: 70px;
                display: inline-block;
                vertical-align: middle;
            }
            a{
                text-decoration: none;
            }
            .block-input{
                margin-top: 10px;

            }
            .block-input span{
                display: inline-block;
                vertical-align: middle;
            }
            .block-input input{
                display: inline-block;
                vertical-align: middle;
                margin: 0;
                padding: 0;
            }
            .product_rating_widget{
                padding: 0px;
                margin: 0px;
            }
            .overall-rating{
                font-size: 12px;
            }
            .product_rating_widget li{
                line-height: 0px;
                width: 22px;
                height: 22px;
                padding: 0px;
                margin: 0px;
                margin-left: 2px;
                list-style: none;
                float: left;
                cursor: pointer;
            }
            .product_rating_widget li span{
                display: none;
            }

            .rating-prod{
                display: inline-block;
                margin: 0 10px;
                vertical-align: middle;
            }

            .prev_img{
                height: 100px;
                width: 100px;
                margin: 5px 5px 5px 0;
                padding: 2px;
                border: 1px solid silver;
            }

            .gallery-block{
                display: inline-block;
                position: relative;
                width: 150px;
                height: 150px;
                overflow:hidden;
                margin: 5px 5px 5px 0;
                padding: 2px;

            }
            .filter-order{
                display: inline-block;
            }
            .all_view_comments{
                cursor: pointer;
            }
            .table-suppliers{
                display: none;
            }
            .view-all-suppliers{
                cursor: pointer;
            }

            .suppliersProductSelect{
                background-color: rgb(238, 238, 238);
                border: medium none;
                border-radius: 4px 0 0 4px;
                color: rgb(136, 153, 153);
                height: 34px;
                left: 0;
                line-height: 13px;
                outline: medium none;
                padding: 8px 15px;
                width: 137px;
            }
            .modal_choice_sup{
                text-align: center;
            }
        </style>
    </head>
<body>
<?php $curr = \ishop\App::$app->getProperty('currency');?>
<?php //session_destroy();?>
<?php //debug($_SESSION);?>
<!-- header -->
<div class="embraceFull">
    <div class="headerBox clear">
        <header class="mainHeader">
            <div class="topHeader clear">
                <div class="embrace clear">
                    <div class="topHeaderBox">
                        <div class="logoBox left">
                            <a href="/"><img src="/images/logo.svg"></a>
                        </div>
                        <nav class="mainNavigation left">
                            <?php if(isset($pages['header'])):?>
                                <ul id="listBox clear">
                                    <li>
                                    <?php foreach ($pages['header'] as $v):?>
                                        <a href="<?='/page/'.$v['alias']?>"><?=$v['title']?></a>
                                    <?php endforeach;?>
                                    </li>
                                </ul>
                            <?php else:?>
                                <ul id="listBox clear">
                                    <li>
                                        <a href="#">empty</a>
                                    </li>
                                </ul>
                            <?php endif;?>
                        </nav>
                        <div class="phoneBox clear right">
                            <div class="callBack right">
                                <!-- <form action="" id="callback">
                                    <input type="text" name="callnumber" placeholder="Your phone">
                                    <input type="submit" class="reCall" value="Call me">
                                </form> -->
                                <button id="reCallMe">CALL ME</button>
                            </div>
                            <div class="phoneNumber right">
                                phone site: 8 800 555 55 55
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="embraceBottom clear spaceAround">
                <div class="bottomHeader clear">
                    <div class="geoMenu left clear">
                        <div class="menuBox left">
                            <div class="productList">
                                <div class="openMenu menuButton" id="menuClosed">
                                        <span class="menuName">
                                            Product List
                                        </span>
                                </div>
                                <div class="closeMenu" id="menuOpened">

                                </div>
                            </div>
                        </div>
                        <div class="warhouseBox left">
                            <span class="menuName closeIt">
                                        Return Page
                                    </span>
                            <p>Your location :</p>
                            <a href="#" class="warhouseLink" id="warhouse">location: 0800, losAngeles</a>
                            <?php /* ?>
                                <select name="warehouse" id="WarehouseSelect">
                                    <?php ////-> Массив складов с выбранным складом для пользователя?>
                                    <?php if(isset($WarehouseArrWithChoiceUserWarehouse) && $WarehouseArrWithChoiceUserWarehouse > false):?>
                                        <?php foreach ($WarehouseArrWithChoiceUserWarehouse as $item):?>
                                            <option value="<?=$item['id']?>" <?php isset($item['selected']) ? print $item['selected']:''?>><?=$item['name']?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                                <?php */ ?>
                        </div>
                    </div>
                    <div class="searchBox left clear">
                        <form action="<?=PATH?>search/" method="get" id="search_form" class="searchForm clear">
                            <select name="category" id="catSelect">
                                <option value="0">All</option>
                                <?php if(isset($primary_category) && $primary_category > false):?>
                                    <?php foreach ($primary_category as $item):?>
                                        <option value="<?=$item['id']?>"><?=$item['title']?></option>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </select>
                            <input type="search" name="search" id="autocomplete" placeholder="Search" class="searchText" <?php if(isset($_SESSION['search'])):?> value="<?=$_SESSION['search']?>"<?php endif?> />
                            <input type="submit" name="searchbutton" value="J" class="searchSubmit" />
                        </form>
                    </div>
                    <div class="cartBox clear right">
                        <div class="cartZone right" id="cart" onclick="getCart(); return false;">
                            <img src="/images/box.svg" alt="Shopping box" id="shoppingBox">
                            <div class="cartCount" id="shoppingCounter">
                                <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart']) ):?>
<!--                                <a href="#" class="cart-count">--><?//=$_SESSION['cart.qty']?><!--</a>-->
                                    <a href="#" class="summ-cart"><?=$_SESSION['cart.sum'] .' '. $_SESSION['cart.currency']['symbol_left']?></a>
                                <?php else:?>
                                    <a href="#" class="summ-cart">Cart is empty!</a>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="pofileLink right">
                            <div class="profileBox clear">
                                 Hello user Jym
                                <select name="" id="currency">
                                    <?php new \app\widgets\currency\Currency();?>
                                </select>
                                <?php if(isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == 2):?>
                                    <a href="/admin/">Admin-panel</a>
                                <?php endif;?>
                            </div>
                        </div>
                        <!--  <span class="wishList-block" id="shoppingWishList">-->
                        <!--                            wishList-->
                        <!--                            <a href="#" class="summWishProd">0</a>-->
                        <!--  </span>-->
                        <!-- opened cart minibox -->
                        <div class="miniCart" id="miniCart">
                            <div class="miniCartBox clear">
                                <div class="closeCart fill">W</div>
                                <div class="miniList">
                                    <ul class="cart-info"></ul>
                                </div>
                                <div class="miniInfo">
                                    <div class="minOrder">
                                        <span class="dollarLeft">
                                            50$
                                        </span>More to minimal order</div>
                                    <div class="minFooter clear">
                                        <div class="wishList" id="shoppingWishList">a</div>
                                        <div class="checkOut">
                                            <a href='/cart' id="checkOut">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /opened cart minibox -->

                        <!-- opened cart minibox -->
                        <div class="miniWish" id="miniWish">
                            <div class="miniCartBox clear">
                                <div class="closeWish fill">W</div>

                                <div class="miniList">
                                    <ul class="wish-info">
                                        <?php if((isset($countProdInWishList['id_select_products_string'])) && $countProdInWishList ['id_select_products_string'] > false):?>
                                            <?php for($i=0, $count = count($countProdInWishList ['id_select_products_string']); $i < $count; $i++):?>
                                                <li class="wish-info-li">
                                                    <a href="<?='/product/' . $countProdInWishList ['id_select_products_string'][$i]['alias']?>">
                                                        <?=$countProdInWishList ['id_select_products_string'][$i]['title']?>
                                                    </a>
                                                </li>
                                            <?php endfor;?>
                                        <?php endif?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!-- /opened cart minibox -->

                        <!-- opened cart minibox -->
                        <div class="miniPopap">
                            <div class="miniCartBox clear">
                                <div class="closePopup fill">W</div>
                                <div class="miniList">
                                    <?php //если пользователь авторизован?>
                                    <?php if(isset($_SESSION['auth'])):?>
                                        <form id="form_add_wish_list" method="post">
                                            <table>
                                                <tbody>
                                                <?php if(isset($wishlist_user) && $wishlist_user > false):?>
                                                    <tr>
                                                        <td>
                                                            <ul class="wish-info content-wishlist">
                                                                <?php for($i=0, $count = count($wishlist_user); $i < $count; $i++):?>
                                                                    <li class="wish-info-li">
                                                                        <label class="label-wish-list" for="optionsRadios<?=$wishlist_user[$i]['id']?>">
                                                                            <input type="radio" name="optionsWishlist" id="optionsRadios<?=$wishlist_user[$i]['id']?>" value="<?=$wishlist_user[$i]['id']?>">
                                                                            <?=$wishlist_user[$i]['title']?>
                                                                        </label>
                                                                    </li>
                                                                <?php endfor;?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endif?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="optionsWishlist" id="optionsWishlistNew" value="new">
                                                        <label for="" class="label-wish-list">Add new wish list<sub>*</sub>:</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input class="form-control profile-input" type="text" name="new_wishlist" id="new_wishlist" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="submit" class="button" name="wishlist_submit" id="wishlist_submit" value="Confirm">
                                                        <input type="text" hidden id="product_id" name="product_id" value="0">
                                                        <p class="notice modal-title-wishlist" id="helpBlockMess"></p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>

                                    <?php else: ?>
                                        <p>To add a product to the wish list, please</p> <a href="/login"> login </a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <!-- /opened cart minibox -->

                    </div>
                    <!-- mobile products list -->
                    <div class="categoryList clear" id="mobiCat">
                        <div class="showBox">
                            <div class="toggleButton childOff">Hide child</div>
                            <div class="toggleButton childOn">Show child</div>
                        </div>
                        <div class="catList">
                            <?php new \app\widgets\menu\Menu([
                                'tpl'=> WWW . '/menu/menu.php',
                                'attrs'=>[
                                    'data'=>'generalMenu',
                                    'id'=>'IdforGeneralMenu'
                                ],
                            ])?>
                        </div>
                    </div>
                    <!-- mobile products list end -->
                </div>
            </div>
        </header>
    </div>
</div>
<!-- header end -->

    <?=$content?>

<footer class="emraceFull">
    <div class="embrace clear">
        <div class="left footerLeft">
            <div class="workingHours">
                Working hours : <span class="workHours">8.00 - 23.00</span> &copy 2017 Zupply Box Inc. All rights reserved.
            </div>
            <div class="socialBox clear">
                <a href="#" class="socialLink">Facebook</a>
                <a href="#" class="socialLink">Twitter</a>
                <a href="#" class="socialLink">Instagram</a>
            </div>
        </div>
        <div class="right footerRight">
            <div class="systemBox clear">
                <?php if(isset($pages['footer'])):?>
                    <ul class="systemMenu clear">
                        <?php foreach ($pages['footer'] as $v):?>
                            <li>
                                <a href="<?='/page/'.$v['alias']?>"><?=$v['title']?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </div>
            <div class="trustLogos">
                <div class="trustIcon">;</div>
                <div class="trustIcon"><</div>
                <div class="trustIcon">:</div>
            </div>
        </div>
    </div>
</footer>
<?php
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();
debug($logs->grep('SELECT'));
?>
<div class="modal" id="modal-edit-name" style="display: none">
    <form action="" method="post" id="form_edit_wishlist" class="uInfo">
        <div class="col-md-12 form-group">
            <h4 class="col-md-12 modal-title-wishlist">List Name</h4><br/>
            <input type="text" id="wishlist_name" class="form-control profile-input" value="" name="wishlist_name" placeholder="" required>
            <span id="helpBlock2" class="help-block" style="display: none"></span>
        </div>
        <div class="col-sm-4 col-sm-offset-4 btn-block-form" role="group" aria-label="...">
            <input type="submit" class="login-btn-form addToCart" name="wish_edit_submit" id="wish_edit_submit" value="Confirm">
            <input type="hidden" hidden id="edit_wishlist_id" name="parent_comment" value="0">
        </div>
    </form>
    <div class="col-md-12 success-edit" style="display: none">
        <div class="modal-header center" style="text-align: center">
            <img src="/images/cart_deal.png" alt="">
        </div>
    </div>
</div>

<div class="modal" id="modal-edit-del-product" style="display: none">
    <form action="" method="post" id="form_delete_wishlist_product">
        <h4 class="col-md-12 modal-title-wishlist">Delete the selected product ?</h4><br/>
        <div class="col-sm-4 col-sm-offset-4 btn-block-form" role="group" aria-label="...">
            <input type="submit" class="login-btn-form addToCart" name="wish_delete_product_submit" id="wish_delete_product_submit" value="Confirm">
            <input type="text" hidden id="delete_wishlist_product_id" name="delete_wishlist_product_id" value="">
            <input type="text" hidden id="delete_from_wishlist" name="delete_from_wishlist" value="">
        </div>
    </form>
    <div class="col-md-12 success-edit" style="display: none">
        <div class="modal-header center" style="text-align: center">
            <img src="/images/cart_deal.png" alt="">
        </div>
    </div>
</div>

<div class="modal" id="modal-edit-del-wishlist" style="display: none">
    <form action="" method="post" id="form_delete_wishlist">
        <h4 class="col-md-12 modal-title-wishlist">Delete the selected list ?</h4><br/>
        <div class="col-sm-4 col-sm-offset-4 btn-block-form" role="group" aria-label="...">
            <input type="submit" class="login-btn-form addToCart" name="wish_delete_submit" id="wish_delete_submit" value="Confirm">
            <input type="text" hidden id="delete_wishlist_id" name="delete_wishlist_id" value="">
        </div>
    </form>
    <div class="col-md-12 success-edit" style="display: none">
        <div class="modal-header center" style="text-align: center">
            <img src="/images/cart_deal.png" alt="">
        </div>
    </div>
</div>

<div class="modal" id="modal-choice-suppliers" style="display: none">
    <form action="" method="post" id="modal_choice_sup" class="modal_choice_sup">
        <h4 class="col-md-12 modal-title-form">Choice suppliers for product</h4><br/>
        <div class="col-md-12 form-group">
            <?php //Список поставщиков ?>
            <div id="supplierInfo"></div>
            <?php //$selectViewSuppliers?>
        </div>
        <br/>
        <div class="col-sm-4 col-sm-offset-4 btn-block-form" role="group" aria-label="...">
            <input type="submit" class="addSup login-btn-form addToCart" name="choice_suppliers_submit"  id="choice_suppliers_submit" value="Confirm">
            <input type="text" hidden id="choice_product_id" name="choice_product_id" value="">
        </div>
    </form>
    <div class="col-md-12 success-edit" style="display: none">
        <div class="modal-header center" style="text-align: center">
            <img src="/images/cart_deal.png" alt="">
        </div>
    </div>
</div>

<!-- responsive and menu elemants -->
<!-- scripts -->
<script>
    <?php //Проверка заголовка ?>
    $.ajaxSetup({
        headers : {'CsrfToken': $('meta[name="csrf-token"]').attr('content')}
    });

    <?php //попап окно ?>
    jQuery(function($){
        // bind event handlers to modal triggers
        $('body').on('click', '.trigger-edit-name', function(e){
            e.preventDefault();
            $('#modal-edit-name').modal().open();
        });

        $('body').on('click', '.trigger-del-product', function(e){
            e.preventDefault();
            $('#modal-edit-del-product').modal().open();
        });

        $('body').on('click', '.trigger-del-wishlist', function(e){
            e.preventDefault();
            $('#modal-edit-del-wishlist').modal().open();
        });

        // attach modal close handler
        $('.modal .close').on('click', function(e){
            e.preventDefault();
            $.modal().close();
        });

        // below isn't important (demo-specific things)
        $('.modal .more-toggle').on('click', function(e){
            e.stopPropagation();
            $('.modal .more').toggle();
        });

        // view all suppliers
        $('.view-all-suppliers').on('click', function (e){
            e.preventDefault();
            $('.table-suppliers').fadeToggle();
        });

        // bind event handlers to modal triggers add-suppl;iers
        $('body').on('click', '.trigger-add-product', function(e){
            e.preventDefault();
            $('#modal-choice-suppliers').modal().open();
        });

    });

    <?php //Обработка запроса при добавлении поставщика?>

    $(document).on('click', '.addSup', function(e){
        e.preventDefault();
        var ob = {'id': $('#choice_product_id').val()};
        var supplierVal = $("select#suppliersProduct").val();
        if(typeof(supplierVal) == 'undefined') supplierVal = false;
        $.ajax({
            type: "POST",
            url: "/category/1",
            dataType: "json",
            data: "param=" + JSON.stringify(ob) + "&param_action=add_product"+ "&param_suppliers=" + supplierVal,
            cache: false,
            success: function (data) {
                if(data == 'true'){
                    alert('Product added!');
                    $('#modal_choice_sup').fadeOut(50);
                    $('.success-edit').fadeIn(300);
                    setTimeout("$.modal().close()",1000);
                    setTimeout("$('#modal_choice_sup').fadeIn()",1500);
                    setTimeout("$('.success-edit').fadeOut()",1500);
                    loadcart();
                }
                else{
                    alert('Product is not available for purchase!');
                    $('#modal-choice-suppliers').modal().close();
                }
            }
        });
    });

    <?php //Обработка запроса на добавление товара ?>
    $(document).on('click', '.button-add', function(){
        var ob = {'id': $(this).data('product')};
        //$("input[name='surname']").val()
        var supplierVal = $(this).data('suppliers');
        if(typeof(supplierVal) == 'undefined') supplierVal = false;
        var ob2 = {'id_suppliers': $(this).data('suppliers')};
        $.ajax({
            type: "POST",
            url: "/category/1",
            dataType: "json",
            data: "param=" + JSON.stringify(ob) + "&param_action=add_product"+ "&param_suppliers=" + supplierVal,
            cache: false,
            success: function (data) {
                if(data == 'true'){
                    alert('Product added!');
                    loadcart();
                }
                else if(data['mess'] == 'supplierChoice'){
                    $('#modal-choice-suppliers').modal().open();
                    $('#choice_product_id').val(data['choice_product_id']);
                    $('#supplierInfo').html(data['supplierView']);
                }
                else{
                    alert('Product is not available for purchase!');
                }
            }
        });
    });

    <?php //Обработка запроса на удаление товара ?>
    $(document).on('click', '.deleteItem', function(){
        var delete_product = $(this).closest('li');
        //console.log(delete_product);
        var ob = {'id': $(this).data('product')};
        var ob_1 = {'action': $(this).data('action')};
        //console.log(ob);
        $.ajax({
            type: "POST",
            url:"/category/1",
            dataType: "json",
            data: "param=" + JSON.stringify(ob) + "&param_action="+ JSON.stringify(ob_1),
            cache: false,
            success: function (data) {
                if(data == 'true'){
                    alert('Success delete!');
                    delete_product.remove();
                    loadcart();
                }
            }
        });
    });

    <?php //Переключаем чекбокс при клике на пустое поле для ввода имени нового листа желаний ?>
    $('#new_wishlist').click(function () {
        $('#optionsWishlistNew').prop('checked', true);
    });

    <?php //передаем значение id продукта в попап окно ?>
    $(document).on('click', '.bookmark', function(){
        var productId = $(this).data('product');
        var product_wish = $('#product_id').val(productId);
    });

    <?php //Обработка запроса на добавление товара в лист желаний ?>
    $(document).on('click', '#wishlist_submit', function(){
        var err_mess_block = $("#helpBlockMess");
        var data = $('#form_add_wish_list').serializeArray();
        event.preventDefault();
        err_mess_block.fadeOut(200);
        $.ajax({
            type: "POST",
            url: 'category/1',
            dataType: "json",
            data: data,
            cache: false,
            success: function (data) {
                if(typeof(data['wishlist_user']) != 'undefined'){
                    $('.content-wishlist').text('');
                    $.each(data['wishlist_user'] , function (index, val) {
                        $('.content-wishlist').append(
                            '<li class="wish-info-li">'+
                            '<label>' +
                            '<input type="radio" name="optionsWishlist" id="optionsRadios'+val["id"]+'" value="'+val["id"]+'">'+val["title"]+'</label>'+'</li>');
                    });
                    //$("#modal-wishlist").modal('hide');
                    $(".modal-title-wishlist").text('Продукт добавлен!');
                    // $("#modal-wishlist-success").modal('show');
                    //setTimeout(function(){$('#modal-wishlist-success').modal('hide')}, 1500);
                    $("#new_wishlist").val('');

                }

                if(typeof(data['wishlist_mess']) != 'undefined' ){
                    //$("#modal-wishlist").modal('hide');
                    err_mess_block.fadeIn(200);
                    err_mess_block.text(data['wishlist_mess']);
                    //$("#modal-wishlist-success").modal('show');
                    //setTimeout(function(){$('#modal-wishlist-success').modal('hide')}, 1500);
                    $("#new_wishlist").val('');
                }

                loadWishList();
            }
        });
    });

    <?php //Данные о корзине ?>
    function loadcart() {
        var ob_1 = {'res': '1'};
        var id_prod ='';
        var title_prod ='';
        var count_prod ='';
        $.ajax({
            type: "POST",
            url: "/category/1",
            dataType: "json",
            data: "param_res=" + JSON.stringify(ob_1),
            cache: false,
            success: function (data) {
                if (data == "0")
                {
                    $(".cart-count").html('');
                    $(".summ-cart").html('not added');
                    $('.building-price').html('Total: '+ 0 + ' USD');
                } else
                {
                    $('.cart-info').html('');
                    // console.log(data);
                    $.each(data['product_info_res'], function(index, value) {
                        //console.log('index:' + index + '//' + 'value:' + value);
                        //alert(count_prod);
                        $('.cart-info').append("<li><a href='/product/"+value["alias"]+"'>"+value["title"]+' '+'(' + value["count"]+ ' * '+ +value["price"]+'$)'+"</a><span class='deleteItem' data-product='"+value["id"]+"' data-action='delete'>`</span></li>");

                    });
                    $(".cart-count").html(data['count']);
                    $(".summ-cart").html(' '+(accounting.formatNumber(data['int'], 2, " ", ",")) + "$");
                    $('.building-price').html('Total: '+ data['int'] + ' USD');
                }
            }
        });
    }

    <?php //Вызыв ф-ии для формирования корзины ?>
    loadcart();

    <?php //Вызов ф-ии для формирования листа желаний, Вызываем если пользователь авторизован ?>
    <?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == 'yes_auth'):?>
    function  loadWishList() {
        var post = 'loadWishlist';
        $.ajax({
            type: "POST",
            url: "/category/1",
            dataType: "json",
            data: "param_post=" + post,
            cache: false,
            success: function (data) {
                //console.log(data['id_select_products_wish_list']);
                if (data)
                {
                    $.each(data['id_select_products_wish_list'], function (index, value) {
                        event_deal_btn = $('.bookmark').filter($("[data-product =" + value + "]"));
                        event_deal = event_deal_btn.children('.fa');
                        event_deal_name = $('.bookmark').filter($("[data-product =" + value + "]")).children('.name-for-button').text('В избранном');
                        if (!event_deal_btn.hasClass("disabled")) {
                            event_deal_btn.prop('disabled', true);
                            event_deal_btn.addClass("disabled");
                        }
                    });
                }
                else
                {
                    $(".label-wish").text('0');
                }
            }
        });
    }
    loadWishList();
    <?php endif;?>

    <?php //Подгрузка товара при нажатии на кнопку #refreash?>
    $(function () {
        if(typeof(num) == 'undefined'){var num = 8;}
        //if(typeof(save_num) == 'undefined'){var save_num = num;}
        $('#refreash').click(function(){
            $('#refreash').prop('disabled', 'true');
            $.ajax({
                url: window.location.href,
                type: "POST",
                data: {"num_page_product": num},
                cache: false,
                success: function(data){
                    if(!data || data == 'false'){$('#refreash').fadeOut(200);return};
                    $('#content-product').append(data);
                    setTimeout(function(){$('.load-content').fadeIn(800);}, 200);
                    $('#refreash').prop('disabled', '');
                    num = num + 8;
                    //var save_num = $.cookie("num_page", num, {expires: 1});
                }
            });
        });
    });

    <?php //выход пользователя?>
    $('#logout').click(function(ev){
        var event_user = $(this).data('event-user');
        //alert(event_user);
        $.ajax({
            type: "POST",
            url: window.location.href,
            dataType: "html",
            data: "event_user="+ event_user,
            cache: false,
            success: function(data) {

                if (data == 'logout')
                {
                    location.reload();
                }

                if (data == 'false')
                {
                    alert("false");
                }

            }
        });
        ev.preventDefault();
    });
</script>

<?php //поиск в хедере сайта?>
<script>
    $("#catSelect").change(function(){
        var category_search = this.value; // $(this).val()
        $.ajax({
            url: "<?=PATH . 'search/'?>",
            type: "POST",
            data: {"category_search": category_search},
            dataType: "html",
            cache: false,
            success: function(data){
                //if(data == 'true') console.log('ok');
            }
        })

    });

    $('#autocomplete').autocomplete({
        source:'<?=PATH . 'search/'?>',
        minLength:2,
        select:function (event, ui){
            window.location = '<?=PATH?>' + 'search/?search=' + encodeURIComponent(ui.item.value);
        }
    });

    $( "#autocomplete" ).autocomplete({
        delay: 500
    });
</script>

<?php //Информация о складе ?>
<script>
    $("#WarehouseSelect").change(function(){
        var WarehouseChoiceValue = this.value; // $(this).val()
        $.ajax({
            url: window.location.href,
            type: "POST",
            data: {"WarehouseChoice": WarehouseChoiceValue},
            cache: false,
            success: function(data){
                location.reload();
                console.log(data);
            }
        });
    });
</script>
<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
<?php
$filename = WWW . '/js/template/' . \ishop\Router::getRoute()['controller'] . '.php';
if (file_exists($filename) > 0){  require_once "$filename"; }
//Обновляем токен
//if(isset($_SESSION['csrf_token'])){unset($_SESSION['csrf_token']);}
?>
<script src="/js/main.js"></script>

<!-- end scripts -->
</body>
</html>