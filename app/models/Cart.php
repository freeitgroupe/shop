<?php
namespace app\models;


class Cart extends AppModel
{
    public function addToCart($product, $qty = 1, $sup = null, $ipAddress = null){
        $productID = $product->id;
        if(isset($_SESSION['cart'][$productID])){
           $_SESSION['cart'][$productID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$productID] = [
               'price'=> $product->price,
               //'cart_ip'=> $ipAddress,
               'title'=>$product->title,
               'alias'=>$product->alias,
               'image'=>$product->alias,
               'qty'=> $qty
            ];
        }
    }
}