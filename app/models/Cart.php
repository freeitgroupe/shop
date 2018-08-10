<?php
namespace app\models;


class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $sup = null, $ipAddress){
        echo 'Cart ';
        $productID = $product->id;
        if(isset($_SESSION['cart'][$productID])){
           $_SESSION['cart_id_product'][$productID]['cart_count'] += $qty;
        }else{
            $_SESSION['cart_id_product'][$productID] = [
               'cart_price'=> $product->price,
               'cart_ip'=> $ipAddress,
               'cart_count'=> $qty
            ];
        }
    }
}