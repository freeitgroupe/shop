<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18.07.2018
 * Time: 13:23
 */

namespace app\controllers;


class CurrencyController extends AppController
{
    public function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency){
            $curr = \R::findOne('currency', 'code = ?', [$currency]);
            if(!empty($curr)){
                setcookie('currency', $currency, time() + 3600*24*7, '/');
            }
        }
        redirect();
    }
}