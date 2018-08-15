<?php

namespace app\controllers;
/*
$id - id товара,
$qty - кол-во товара,
$sup - поставщик товара
*/

use app\models\Cart;

class CartController extends AppController
{
    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : false;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : false;
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        //$sup = !empty($_GET['sup']) ? (int)$_GET['sup'] : null;
        $sup = false;
        if($id > false && $qty > false){
            $product = \R::findOne('products', 'id = ? AND mark_view = ?', [$id, '1']);
            if(!$product) return false;
        }else{
            return false;
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $sup, $ipAddress);
        if($this->isAjax()){
            $this->loadView('cartModal');
        }else{
            redirect();
        }
        die();
    }

    public function showAction(){
        if($this->isAjax()){
            $this->loadView('cartModal');
        }else{
            redirect();
        }
    }
}