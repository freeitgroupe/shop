<?php
/**
 * Created by PhpStorm.
 * User: admin2
 * Date: 19.08.2018
 * Time: 22:32
 */

namespace app\controllers;
use app\models\Breadcrumbs;
use app\models\Category;
use ishop\App;
use ishop\libs\Pagination;

class CategoryController extends AppController
{
    protected $categoryIds;
    protected $totalProducts;

    public function viewAction(){
        $alias = $this->route['alias'];
        $category = \R::findOne('category', "alias = ? AND `view` = '1'", [$alias]);
        if(!$category){
            throw new \Exception('Page not found!', 404);
        }
        $cat_model = new Category();
        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $this->categoryIds = $this->getCategoryIds($category->id);

        $this->totalProducts = \R::count('products', "category_id IN ({$this->categoryIds}) AND mark_view = '1'");
        //debug($this->totalProducts);
        $perpage = App::$app->getProperty('pagination');
        $currentPage = 1;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($page, $perpage, $this->totalProducts);
        $start = $pagination->getStart();
        $productsForPage = $pagination->getLimitProductsForPage();
        $products = \R::find('products', "category_id IN ($this->categoryIds) AND mark_view = '1' LIMIT {$productsForPage}");

        $this->setMeta($category->title, $category->description, $category->m_keywords);
        $this->set(compact('products', 'breadcrumbs','pagination', 'totalProducts', 'currentPage'));

        if($this->isAjax()){
            $products = \R::find('products', "category_id IN ($this->categoryIds) AND mark_view = '1' LIMIT $start,  $perpage");
            $this->loadView('categoryAjax',$products);
        }

    }

    public function getCategoryIds($categoryId){
        $cat_model = new Category();
        $ids = $cat_model->getIds($categoryId);
        $ids = !$ids ? $categoryId : $ids . $categoryId;
        return $ids;
    }

    public function getCategoryInfo($ids){
        return $category = \R::getAssoc("SELECT * FROM category WHERE  `view` = '1' AND id IN ($ids)");
    }

    public function getAllCategory(){
        return \R::getAll("SELECT * FROM category WHERE  `view` = '1'");
    }

    public function pageAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');

    }
}