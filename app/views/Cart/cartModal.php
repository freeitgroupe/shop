<?php if(!empty($_SESSION['cart'])): ?>
<?php foreach ($_SESSION['cart'] as $id=>$item):?>
    <li class="cart-info-li">
        <a href="product/<?=$item['alias']?>"><?=$item['title'] . ' (' . $item['qty'] . ' * ' . $item['price'] . ') '?></a><span class='deleteItem' data-product="<?=$id?>" data-action='delete'>`</span>
    </li>
<?php endforeach;?>
    <h3>Total: <?=$_SESSION['cart.sum'] . ' ' . $_SESSION['cart.currency']['symbol_left']?></h3>
    <div class="clearCart">
        <a href="#" onclick="clearCart(); return false;" style="color: rgb(79, 205, 242);padding:10px 0">Clear cart</a>
    </div>
    <input type='hidden' value="<?=$_SESSION['cart.sum'] . ' ' . $_SESSION['cart.currency']['symbol_left']?>" id="sumCartAll">
<?php else: ?>
    <h3>Cart is empty!</h3>
<?php endif;?>
