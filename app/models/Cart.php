<?php
namespace app\models;


use ishop\App;

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
               'image'=>$product->image,
               'qty'=> $qty
            ];
        }
        if(!isset($_SESSION['cart.currency'])){
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}