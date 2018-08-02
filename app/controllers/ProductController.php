<?php
namespace app\controllers;


class ProductController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $get_one_product = \R::findOne('products', "alias = ? AND mark_view = '1'", [$alias]);
        $id = $get_one_product->id;
        //$product_rating = \R::findOne('prod_rating', "product_id = {$get_one_product->id} AND status = 1");
        $sql = 'SELECT rating_number, rating_id as id, FORMAT((total_points / rating_number),1) as average_rating FROM prod_rating WHERE product_id =' . $id . ' AND status = 1 ';
        $rows = \R::getAll($sql);
        $product_rating = \R::convertToBeans('prod_rating',$rows);

        debug($product_rating);
        if(!$get_one_product){
            throw  new \Exception('Page not found',404);
        }

        //хлебные крошки

        //связанные товары

        //запись в куки запрошенного товара

        //просмотренные товары

        //галерея

        //модификация

        //рейтинг товара

        //


        $this->setMeta($get_one_product->title, $get_one_product->meta_d, $get_one_product->meta_k);
        $this->set(compact('get_one_product', 'product_rating'));


        //debug($this->content);
    }

}