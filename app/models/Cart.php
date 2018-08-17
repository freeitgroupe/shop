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

    public static function recalc($curr){
        if(isset($_SESSION['cart.currency'])){
            if($_SESSION['cart.currency']['base']){
                $_SESSION['cart.sum'] *= $curr->value;
            }else{
                $_SESSION['cart.sum'] = $_SESSION['cart.sum'] / $_SESSION['cart.currency']['value'] * $curr->value;
            }
            $_SESSION['cart.sum'] = round($_SESSION['cart.sum'],  2);
            foreach($_SESSION['cart'] as $k => $v){
                if($_SESSION['cart.currency']['base']){
                    $_SESSION['cart'][$k]['price'] *= $curr->value;
                    $_SESSION['cart'][$k]['price'] = round($_SESSION['cart'][$k]['price'], 2);
                }else{
                    $_SESSION['cart'][$k]['price'] = $_SESSION['cart'][$k]['price'] / $_SESSION['cart.currency']['value'] * $curr->value;
                    $_SESSION['cart'][$k]['price'] = round($_SESSION['cart'][$k]['price'], 2);
                }
            }
            foreach($curr as $k => $v){
                $_SESSION['cart.currency'][$k] = $v;
            }
        }
    }
}