<?php if(!empty($_SESSION['cart'])): ?>
<?php foreach ($_SESSION['cart'] as $id=>$item):?>
    <li class="cart-info-li">
        <a href="product/<?=$item['alias']?>"><?=$item['title'] . ' (' . $item['qty'] . ' * ' . $item['price'] . ') '?></a><span class='deleteItem' data-product="<?=$id?>" data-action='delete'>`</span>
    </li>
<?php endforeach;?>
<?php else: ?>
    <li class="cart-info-li"><h3>Cart is empty!</h3></li>
<?php endif;?>
