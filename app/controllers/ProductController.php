<?php
namespace app\controllers;


use app\models\Product;

class ProductController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $get_one_product = \R::findOne('products', "alias = ? AND mark_view = '1'", [$alias]);

        if(!$get_one_product){
            throw  new \Exception('Page not found',404);
        }

        //Рейтинг товара
        $id = $get_one_product->id;
        $sql = 'SELECT rating_number, rating_id as id, FORMAT((total_points / rating_number),1) as average_rating FROM prod_rating WHERE product_id =' . $id . ' AND status = 1 ';
        $rows = \R::getAll($sql);
        $resProductRating = \R::convertToBeans('prod_rating',$rows);

        $product_rating = [];
        if(count($resProductRating) >= 1){
            foreach ($resProductRating as $v){
                $product_rating['average_rating'] = $v->average_rating;
                $product_rating['rating_number'] = $v->rating_number;
            }
        }else{
            $product_rating['average_rating'] = 0;
            $product_rating['rating_number'] = 0;
        }

        //хлебные крошки

        //связанные товары

        //запись в куки запрошенного товара
        $pModel = new Product();
        $pModel->setRecentlyViewed($get_one_product->id);


        //просмотренные товары

        //галерея

        //модификация



        $this->setMeta($get_one_product->title, $get_one_product->meta_d, $get_one_product->meta_k);
        $this->set(compact('get_one_product', 'product_rating'));


        //debug($this->content);
    }

}