<?php
namespace app\controllers;


use app\models\Breadcrumbs;
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
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($get_one_product->category_id, $get_one_product->title);

        //связанные товары
        $relatedProducts = \R::getAll("SELECT `additions_products`.*,`products`.id, `products`.alias, `products`.title, `products`.image, `products`.price, `products`.stock_id,`products`.upsell_product   FROM `additions_products` INNER JOIN `products` ON `additions_products`.related_additions_id = `products`.id WHERE `products`.mark_view = '1' AND `additions_products`.product_id = ? LIMIT 4", [$get_one_product->id]);


        //запись в куки запрошенного товара
        $pModel = new Product();
        $pModel->setRecentlyViewed($get_one_product->id);

        //просмотренные товары из кук
        $rViewed = $pModel->getRecentlyViewed();
        $recentlyViewed = null;
        if($rViewed){
            $recentlyViewed = \R::find('products', 'id IN (' . \R::genSlots($rViewed) .') LIMIT 4', $rViewed);
        }
        //debug($recentlyViewed);

        //галерея

        //модификация



        $this->setMeta($get_one_product->title, $get_one_product->meta_d, $get_one_product->meta_k);
        $this->set(compact('get_one_product', 'product_rating', 'recentlyViewed', 'breadcrumbs'));


        //debug($this->content);
    }

}