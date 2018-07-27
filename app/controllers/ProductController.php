<?php
namespace app\controllers;


class ProductController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $get_one_product = \R::findOne('products', "alias = ? AND mark_view = '1'", [$alias]) ;
        if(!$get_one_product){
            throw  new \Exception('Page not found',404);
        }

        //хлебные крошки

        //связанные товары

        //запись в куки запрошенного товара

        //просмотренные товары

        //галерея

        //модификация

        $this->setMeta($get_one_product->title, $get_one_product->meta_d, $get_one_product->meta_k);

        //debug($this->content);
    }

}