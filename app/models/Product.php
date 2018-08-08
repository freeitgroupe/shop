<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.08.2018
 * Time: 11:28
 */

namespace app\models;


class Product extends AppModel
{
    //запись в куки
    public function setRecentlyViewed($id){
       $recentlyViewed = $this->getAllRecentlyViewed();
       if(!$recentlyViewed){
           setcookie('recentlyViewed', $id, time() + 3600 * 24, '/');
       }else{
           $recentlyViewed = explode('.', $recentlyViewed);
           if(!in_array($id, $recentlyViewed)){
               $recentlyViewed[] = $id;
               $recentlyViewed = implode('.', $recentlyViewed);
               setcookie('recentlyViewed', $recentlyViewed, time() + 3600 * 24, '/');
           }
       }
    }

    //достаем из кук определеннное кол. товара
    public function getRecentlyViewed(){
        if(!empty($_COOKIE['recentlyViewed'])){
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed = explode('.', $recentlyViewed);
            return array_slice($recentlyViewed, -4);
        }
        return false;
    }

    //достаем все просмотренные товары из кук
    public function getAllRecentlyViewed(){
        if(!empty($_COOKIE['recentlyViewed'])){
            return $_COOKIE['recentlyViewed'];
        }
        return false;
    }


}